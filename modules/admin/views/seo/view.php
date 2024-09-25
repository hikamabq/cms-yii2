<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\seo\Seo $model */
/** @var yii\widgets\ActiveForm $form */
$this->title = 'SimpleSEO';
?>


<h3><?= Html::encode($this->title) ?></h3>
<div class="seo-form bg-white p-3 rounded shadow-sm p-4 mb-3">
    <div class="row">
        <div class="col-md-12">
            <p class="text-secondary">
                SimpleSEO adalah pengaturan sederhana yang membantu website muncul di Google dalam waktu 12-48 jam setelah google site verivication di atur dan disetujui melalui Google Console Search
            </p>
            <div class="alert alert-success">
                <span class="text-success">Perubahan pada SEO akan muncul di Google 7-30 hari</span>
            </div>

        </div>
    </div>
</div>
<div class="seo-form bg-white p-3 rounded shadow-sm p-4 mb-3">
    <div class="row">
        <div class="col-md-12">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'google_verification_site')->textInput(['disabled' => true]) ?>

            <?= $form->field($model, 'name')->textInput(['disabled' => true]) ?>

            <?= $form->field($model, 'url')->textInput(['disabled' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['disabled' => true]) ?>

            <?= $form->field($model, 'keyword')->textInput(['disabled' => true]) ?>

            <?= $form->field($model, 'author')->textInput(['disabled' => true]) ?>

            <div class="form-group mt-3">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm py-2 px-4 btn-dark']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
