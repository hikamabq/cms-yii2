<?php

use app\commands\Filter;
use app\commands\Helpers;
use kartik\editors\Summernote;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\posts\Posts $model */
/** @var yii\widgets\ActiveForm $form */
?>


<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-8 mb-3">
            <div class="posts-form bg-white rounded p-4 shadow-sm">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        
            <?= $form->field($model, 'description')->widget(Summernote::class, [
                'useKrajeePresets' => true,
            ]); ?>

            <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="posts-form bg-white rounded p-4 shadow-sm">
            <?php if($model->id != null){ ?>
            <?= $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'initialPreview'=>[
                        Url::to(['@web/uploads/'.$model->thumbnail.''])
                    ],
                    'initialPreviewAsData'=>true,
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]); ?>
            <?php }else{ ?>
            <?= $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'showRemove' => true,
                    'showUpload' => false
                ]
            ]); ?>
            <?php } ?>
            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->widget(
                Select2::classname(), 
                Filter::select(Helpers::filterStatus())
            ); ?>
        </div>
    </div>
</div>


    <div class="form-group mt-3">
        <?= Html::a('Cancel', ['posts/pages/'.$_SESSION['pages'].''], ['class' => 'btn btn-sm btn-light py-2 px-4']) ?>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-sm btn-dark py-2 px-4']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

