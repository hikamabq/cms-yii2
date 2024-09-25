<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\seo\Seo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="seo-form bg-white p-3 rounded shadow-sm">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'google_verification_site')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <div class="form-group mt-3">
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-sm btn-light py-2 px-4']) ?>
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-sm btn-dark py-2 px-4']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
