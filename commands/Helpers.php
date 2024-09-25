<?php 
namespace app\commands;

use app\modules\admin\models\category\Category;
use app\modules\admin\models\desa\Desa;
use app\modules\admin\models\kecamatan\Kecamatan;
use app\modules\admin\models\kota\Kota;
use app\modules\admin\models\provinsi\Provinsi;
use app\modules\admin\models\relawan\Relawan;
use kartik\select2\Select2;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;



class Helpers{

    public static function accessControl(){
        $access = [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ];
        return $access;
    }
    public static function pages(){
        $route = Yii::$app->request->pathInfo;
        $module = explode('/',$route); 

        if(empty($module[3]) || $module[3] == null){
            $url = '/';
        }else{
            $route = $module[3];
            if($route != null || !empty($route)){
                $url = $route;
            }else{
                $url = '/';
            }
        }
        // $_SESSION['pages'] = $url;
        return $url;
    }
    public static function select($paramFIlter)
    {
        return [
                'data' => $paramFIlter,
                'options' => ['placeholder' => '', 'multiple' => false, 'required' => false],
                'pluginOptions' => [
                    'allowClear' => true
                ],
                'theme' => Select2::THEME_KRAJEE,
                'size' => 'md',
            ];
    }

    public static function status($model){
        if($model == 1){
            return '<span class="bg-success bg-opacity-10 text-success rounded py-1 px-3">Publish</span>';
        }else{
            return '<span class="bg-info bg-opacity-10 text-success rounded py-1 px-3">Save</span>';
        }
    }
    public static function filterStatus(){
        $data = [
            [
                'id' => 0,
                'name' => 'Save'
            ],
            [
                'id' => 1,
                'name' => 'Publish'
            ]
        ];
        $result = ArrayHelper::map($data, 'id', 'name');
        return $result;
    }
    public static function type($model){
        if($model == 0){
            return '<span class="bg-success bg-opacity-10 text-success rounded py-1 px-3">Post</span>';
        }else{
            return '<span class="bg-warning bg-opacity-10 text-warning rounded py-1 px-3">Single</span>';
        }
    }
    public static function filterType(){
        $data = [
            [
                'id' => 0,
                'name' => 'Post'
            ],
            [
                'id' => 1,
                'name' => 'Single'
            ]
        ];
        $result = ArrayHelper::map($data, 'id', 'name');
        return $result;
    }

}