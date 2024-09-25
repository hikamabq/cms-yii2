<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="site-login">
        <div class="row">
            <div class="col-md-8 p-5 vh-100 d-none d-sm-none d-md-block d-lg-block bg-secondary bg-opacity-10">
                
            </div>
            <div class="col-md-4 p-5 mt-3">
                <div class="mb-5">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="46"  height="46"  viewBox="0 0 24 24"  fill="#e11d48"  class="icon icon-tabler icons-tabler-filled icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.088 4.82a10 10 0 0 1 9.412 .314a1 1 0 0 1 .493 .748l.007 .118v13a1 1 0 0 1 -1.5 .866a8 8 0 0 0 -8 0a1 1 0 0 1 -1 0a8 8 0 0 0 -7.733 -.148l-.327 .18l-.103 .044l-.049 .016l-.11 .026l-.061 .01l-.117 .006h-.042l-.11 -.012l-.077 -.014l-.108 -.032l-.126 -.056l-.095 -.056l-.089 -.067l-.06 -.056l-.073 -.082l-.064 -.089l-.022 -.036l-.032 -.06l-.044 -.103l-.016 -.049l-.026 -.11l-.01 -.061l-.004 -.049l-.002 -.068v-13a1 1 0 0 1 .5 -.866a10 10 0 0 1 9.412 -.314l.088 .044l.088 -.044z" /></svg>    
                    <span class="fw-bold h4 d-block">CMS</span>
                </div>
                <!-- <h3 class="mb-3 mt-5">Login</h3> -->
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                ]); ?>
            
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            
                <?= $form->field($model, 'password')->passwordInput() ?>
                
                <div class="form-group my-4">
                    <?= Html::submitButton('Masuk', ['class' => 'btn btn-dark w-100 py-2 mb-3', 'name' => 'login-button']) ?>
                </div>
                <a href="<?= Url::to('/') ?>" class="small text-decoration-none text-secondary">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                    Back
                </a>
            </div>
        </div>
    
    
        <?php ActiveForm::end(); ?>
    </div>
</div>
