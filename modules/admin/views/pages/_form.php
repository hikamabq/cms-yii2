<?php

use app\commands\Filter;
use app\commands\Helpers;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\pages\Pages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pages-form bg-white rounded p-3 shadow-sm mb-3">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'type')->widget(
        Select2::classname(), 
        Filter::select(Helpers::filterType())
    ); ?>
    <div class="form-group mt-3">
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-sm btn-light py-2 px-4']) ?>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-sm btn-dark py-2 px-4']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
<div class="row">
    <div class="col-md-12 pt-1">
        <div class="">
            <b>Example Type</b>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100 p-2">
                        <b class="py-1 ps-2">Posts</b>
                        <div class="">
                            <div class="row px-3 py-1">
                                <?php for ($i=0; $i < 6; $i++) { ?>
                                <div class="col-4 col-md-4 p-2">
                                    <div class="">
                                        <div style="height: 70px;" class="bg-light mb-1 rounded"></div>
                                        <span class="xsmall d-block">Title in here</span>
                                        <span class="xsmall text-secondary">caption in here</span>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100 p-2">
                        <b class="py-1 ps-2">Single</b>
                        <div class="">
                            <div class="row px-3 py-1">
                                <div class="col-12 col-md-12 p-2">
                                    <div class="">
                                        <span class="xsmall d-block">Title in here</span>
                                        <div style="height: 100px;" class="bg-light mb-1 rounded"></div>
                                        <span class="xsmall text-secondary">
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum praesentium quos eligendi doloremque, optio dolorem odio dolores eos reiciendis provident ducimus temporibus et iure excepturi adipisci explicabo veritatis voluptatem sint.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>