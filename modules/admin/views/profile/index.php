<?php

use app\modules\admin\models\profile\Profile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\profile\ProfileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">
    <?php Pjax::begin(); ?>

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="bg-white rounded p-3 shadow-sm mb-3">
        <div class="row">
            <div class="col-md-5 mb-3">
                <h5>Umum</h5>
                <span class="text-secondary">Mengatur nama dan logo website.</span>
            </div>
            <div class="col-md-7">
                <div class="logo mb-3">
                    <div style="width: 100px; height:100px;" class="border rounded-circle bg-light"></div>
                </div>
                <div class="mb-2">
                    <label for="" class="control-label">Nama Website</label>
                    <input type="text" value="CMS PRO" class="form-control" disabled>
                </div>
                <div class="form-group mt-3">
                    <?= Html::a('Edit', ['index'], ['class' => 'btn btn-sm btn-dark py-2 px-4']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded p-3 shadow-sm mb-3">
        <div class="row">
            <div class="col-md-5 mb-3">
                <h5>Kontak dan Email</h5>
                <span class="text-secondary">Mengatur kontak berupa nomor HP atau email.</span>
            </div>
            <div class="col-md-7">
                <div class="py-2 d-flex justify-content-between align-middle">
                    <div>
                        <b class="d-block">Admin</b>
                        <span>086377733</span>
                    </div>
                    <div>
                        <a href="" class="py-1 text-info">Edit</a> |
                        <a href="" class="py-1 text-info">Delete</a>
                    </div>
                </div>
                <div class="py-2 d-flex justify-content-between align-middle">
                    <div>
                        <b class="d-block">Admin</b>
                        <span>admin@email.com</span>
                    </div>
                    <div>
                        <a href="" class="py-1 text-info">Edit</a> |
                        <a href="" class="py-1 text-info">Delete</a>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <?= Html::a('Add', ['index'], ['class' => 'btn btn-sm btn-dark py-2 px-4']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded p-3 shadow-sm mb-3">
        <div class="row">
            <div class="col-md-5 mb-3">
                <h5>Sosial Media</h5>
                <span class="text-secondary">Mengatur sosial media untuk website anda.</span>
            </div>
            <div class="col-md-7">
                <div class="mb-2">
                    <label for="" class="control-label">Facebook</label>
                    <input type="text" value="https://" class="form-control" disabled>
                </div>
                <div class="mb-2">
                    <label for="" class="control-label">Instagram</label>
                    <input type="text" value="https://" class="form-control" disabled>
                </div>
                <div class="mb-2">
                    <label for="" class="control-label">Youtube</label>
                    <input type="text" value="https://" class="form-control" disabled>
                </div>
                <div class="mb-2">
                    <label for="" class="control-label">TikTok</label>
                    <input type="text" value="https://" class="form-control" disabled>
                </div>
                <div class="mb-2">
                    <label for="" class="control-label">Twitter</label>
                    <input type="text" value="https://" class="form-control" disabled>
                </div>
                <div class="mb-2">
                    <label for="" class="control-label">LinkedIn</label>
                    <input type="text" value="https://" class="form-control" disabled>
                </div>
                <div class="form-group mt-3">
                    <?= Html::a('Edit', ['index'], ['class' => 'btn btn-sm btn-dark py-2 px-4']) ?>
                </div>
            </div>
        </div>
    </div>


    <?php Pjax::end(); ?>

</div>
