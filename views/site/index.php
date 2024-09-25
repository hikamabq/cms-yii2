<?php

/** @var yii\web\View $this */

use app\modules\admin\models\pages\Pages;
use app\modules\admin\models\posts\Posts;
use yii\helpers\Url;
use yii\widgets\Pjax;

$pages = Pages::find()->where(['type' => 0])->all();

$this->title = 'Beranda';
?>
<?php Pjax::begin(); ?>
<div class="bg-white">
    <div class="container py-5">
        <div class="section-banner">
            <div class="row">
                <div class="col-md-6 mb-3 d-flex align-items-center">
                    <div class="highlight">
                        <a href="" class="text-decoration-none">
                            <h1 class="text-dark">Title or Header in here</h1>
                            <p class="small text-secondary">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur ducimus deleniti obcaecati. Deserunt nulla voluptas veritatis. Dolorum qui reiciendis odit, velit ratione rerum, porro, voluptas eveniet quam dolores atque possimus!
                            </p>
                        </a>
                        <a href="" class="btn btn-dark px-4">Read more</a>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <a href="">
                        <div class="w-100 bg-light rounded" style="height: 250px;"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="section-posts my-3">
        <?php foreach($pages as $dataPages){ ?>
        <div class="row mb-3">
            <div class="col-md-12">
                <h3><?= $dataPages['name'] ?></h3>
            </div>
            <?php 
            $posts = Posts::find()->where(['id_pages' => $dataPages['id']])->all();
            foreach($posts as $data){  ?>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card border-0 h-100">
                    <div class="card-header border-bottom-0 bg-light rounded p-0">
                        <a href="<?= Url::to('/detail/slug') ?>">
                            <div class="w-100 overflow-hidden" style="height: 150px;">
                                <img src="<?= Url::to('@web/uploads/'.$data['thumbnail'] .'') ?>" alt="" class="img-fluid">
                            </div>
                        </a>
                    </div>
                    <div class="card-body ps-0 pb-0">
                        <span class="d-block xsmall text-secondary mb-2">
                            <span>
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="14"  height="14"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-alarm"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                            </span>
                            14 Sept 2024
                        </span>
                        <a href="<?= Url::to('/detail/slug') ?>" class="text-decoration-none">
                            <b class="fw-semibold small text-dark"><?= $data['title'] ?></b>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <div class="section-banner mb-3">
        <div class="row">
            <div class="col-md-12 mb-3 d-none d-md-block">
                <div class="w-100 bg-white rounded p-5 text-center">
                    <h3 class="text-dark">Quotes</h3>
                    <p class="text-dark text-opacity-50">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, dignissimos? Ullam maiores sed provident minus sunt voluptate, recusandae eius fuga ipsam ipsa unde id totam sint! Quae deleniti quidem officia.
                    </p>
                    <span class="text-muted small">Hikam Abqory</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Pjax::end(); ?>