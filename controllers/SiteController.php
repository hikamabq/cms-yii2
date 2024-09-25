<?php

namespace app\controllers;

use app\commands\Helpers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ForgotForm;
use app\modules\admin\models\category\Category;
use app\modules\admin\models\desa\Desa;
use app\modules\admin\models\kecamatan\Kecamatan;
use app\modules\admin\models\kota\Kota;
use app\modules\admin\models\pages\Pages;
use app\modules\admin\models\posts\Posts;
use app\modules\admin\models\posts\PostsSearch;
use app\modules\admin\models\relawan\Relawan;
use app\modules\admin\models\slide\Slide;
use app\modules\admin\models\users\Users;
use kartik\mpdf\Pdf;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionPosts($slug)
    {
        $cek = Pages::findOne(['slug' => $slug]);
        if(!empty($cek) || $cek |= null){
            $searchModel = new PostsSearch();
            $dataProvider = $searchModel->searchPosts($this->request->queryParams, $slug);
            if($cek->type == 0){
                return $this->render('posts', [
                    'posts' => $dataProvider->models,
                    'slug' => $slug
                ]);
            }else{
                return $this->render('single', [
                    'posts' => $dataProvider->models,
                    'slug' => $slug
                ]);
            }
        }else{
            return $this->redirect('/');
        }
    }
    public function actionDetail($slug){
        return $this->render('detail', [
            'slug' => $slug
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/admin']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin']);
        }

        $model->password = '';
        $this->layout = 'auth';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    // reset password
    public function actionForgotPassword(){
        $model = new ForgotForm();
        if ($model->load(Yii::$app->request->post())) {
            $update = Users::findOne(['username' => $model->username]);
            if($update != null || !empty($update)){
                $update->password = Yii::$app->getSecurity()->generatePasswordHash($model->password_baru);
                $update->save();
                Yii::$app->session->setFlash('success', "Password berhasil diperbarui.");
                return $this->redirect(['/site/forgot-password']);
            }else{
                Yii::$app->session->setFlash('error', "Username tidak ditemukan.");
                return $this->redirect(['/site/forgot-password']);
            }
        }
        return $this->render('forgot', [
            'model' => $model,
        ]);
    }
}
