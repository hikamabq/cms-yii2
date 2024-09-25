<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\pages\Pages;
use app\modules\admin\models\posts\Posts;
use app\modules\admin\models\posts\PostsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostsController implements the CRUD actions for Posts model.
 */
class PostsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Posts models.
     *
     * @return string
     */
    public function actionIndex($pages)
    {
        $_SESSION['pages'] = $pages;
        if($pages == null){
            $pages = 'home';
        }else{
            $pages = $_SESSION['pages'];
        }
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->searchPosts($this->request->queryParams, $pages);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPages($pages)
    {
        $_SESSION['pages'] = $pages;
        if($pages == null){
            $pages = 'home';
        }else{
            $pages = $_SESSION['pages'];
        }
        $searchModel = new PostsSearch();
        $dataProvider = $searchModel->searchPosts($this->request->queryParams, $pages);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        return $this->render('view', [
            'model' => Posts::findOne(['slug' => $slug]),
        ]);
    }

    /**
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($pages)
    {
        $_SESSION['pages'] = $pages;
        $model = new Posts();

        $page = Pages::findOne(['slug' => $pages]);
        $model->id_pages = $page->id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $upload = UploadedFile::getInstance($model, 'thumbnail');
                $name_file = rand();
                if (!empty($upload)) {
                    $upload->saveAs('uploads/' . $name_file . '.' . $upload->extension);
                    $model->thumbnail = $name_file . '.' . $upload->extension;
                }
                $model->save();
                return $this->redirect(['posts/pages/'.$pages]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($p, $slug)
    {
        $_SESSION['pages'] = $p;
        $model = Posts::findOne(['slug' => $slug]);
        $gambar_lama = $model->thumbnail;

        if ($this->request->isPost && $model->load($this->request->post()) ) {
            if ($model->thumbnail == null) {
                $model->thumbnail = $gambar_lama;
            }
            $upload = UploadedFile::getInstance($model, 'thumbnail');
            $name_file = rand();
            if (!empty($upload)) {
                $upload->saveAs('uploads/' . $name_file . '.' . $upload->extension);
                $model->thumbnail = $name_file . '.' . $upload->extension;
            }
            $model->save();
            return $this->redirect(['posts/pages/'.$p]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
