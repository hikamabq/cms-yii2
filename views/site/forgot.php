<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use app\widgets\Alert;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'MAPADI | Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="site-login pt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 py-5 mt-3">
                <?= Alert::widget() ?>
                <h3 class="m-0">Lupa Password</h3>
                <?php $form = ActiveForm::begin([
                    'id' => 'forgot-form',
                ]); ?>
            
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password_baru')->passwordInput() ?>
                
                <?= $form->field($model, 'konfirmasi_password')->passwordInput() ?>
                
                <div class="form-group my-4">
                    <?= Html::submitButton('Reset Password', ['class' => 'btn btn-danger rounded-0 w-100 py-2 mb-3', 'name' => 'login-button']) ?>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    
    
        <?php ActiveForm::end(); ?>
    </div>
</div>
