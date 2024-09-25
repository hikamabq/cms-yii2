<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\modules\admin\models\pages\Pages;
use app\modules\admin\models\profile\Profile;
use app\modules\admin\models\seo\Seo;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use yii\widgets\Pjax;

$profile = Profile::findOne(['id' => 1]);
$seo = Seo::findOne(1);
$pages = Pages::find()->all();
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="google-site-verification" content="<?= $seo->google_site_verification ?? '' ?>" />
    <meta name="title" content="<?= $seo->title ?? '' ?>">
    <meta name="description" content="<?= $seo->description ?? '' ?>">
    <meta name="keywords" content="<?= $seo->keywords ?? '' ?>">
    <meta name="author" content="<?= $seo->author ?? '' ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $seo->url ?? '' ?>">
    <meta property="og:title" content="<?= $seo->title ?? '' ?>">
    <meta property="og:description" content="<?= $seo->description ?? '' ?>">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $seo->url ?? '' ?>">
    <meta property="twitter:title" content="<?= $seo->title ?? '' ?>">
    <meta property="twitter:description" content="<?= $seo->description ?? '' ?>">
    <meta property="twitter:image" content="">
    <?php $this->head() ?>
</head>
<body class="">
<?php $this->beginBody() ?>
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="#e11d48"  class="icon icon-tabler icons-tabler-filled icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.088 4.82a10 10 0 0 1 9.412 .314a1 1 0 0 1 .493 .748l.007 .118v13a1 1 0 0 1 -1.5 .866a8 8 0 0 0 -8 0a1 1 0 0 1 -1 0a8 8 0 0 0 -7.733 -.148l-.327 .18l-.103 .044l-.049 .016l-.11 .026l-.061 .01l-.117 .006h-.042l-.11 -.012l-.077 -.014l-.108 -.032l-.126 -.056l-.095 -.056l-.089 -.067l-.06 -.056l-.073 -.082l-.064 -.089l-.022 -.036l-.032 -.06l-.044 -.103l-.016 -.049l-.026 -.11l-.01 -.061l-.004 -.049l-.002 -.068v-13a1 1 0 0 1 .5 -.866a10 10 0 0 1 9.412 -.314l.088 .044l.088 -.044z" /></svg>
                <span class="fw-bold">CMS</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= Url::to('/'); ?>">Beranda</a>
                    </li>
                    <?php foreach($pages as $data){ ?>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="<?= Url::to('/'.$data['slug'].''); ?>"><?= $data['name'] ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 ms-3">
                    <li class="nav-item">
                        <a class="nav-link bg-dark text-light rounded d-inline-block px-3" href="<?= Url::to('/login'); ?>">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?= $content ?>
    <footer class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <h2 class="fw-bold">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="48"  height="48"  viewBox="0 0 24 24"  fill="#e11d48"  class="icon icon-tabler icons-tabler-filled icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.088 4.82a10 10 0 0 1 9.412 .314a1 1 0 0 1 .493 .748l.007 .118v13a1 1 0 0 1 -1.5 .866a8 8 0 0 0 -8 0a1 1 0 0 1 -1 0a8 8 0 0 0 -7.733 -.148l-.327 .18l-.103 .044l-.049 .016l-.11 .026l-.061 .01l-.117 .006h-.042l-.11 -.012l-.077 -.014l-.108 -.032l-.126 -.056l-.095 -.056l-.089 -.067l-.06 -.056l-.073 -.082l-.064 -.089l-.022 -.036l-.032 -.06l-.044 -.103l-.016 -.049l-.026 -.11l-.01 -.061l-.004 -.049l-.002 -.068v-13a1 1 0 0 1 .5 -.866a10 10 0 0 1 9.412 -.314l.088 .044l.088 -.044z" /></svg>    
                        CMS
                    </h2>
                    <p class="small text-secondary">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quas, ab unde incidunt sapiente consequuntur eius ipsam nulla optio nam possimus iste voluptatem qui nostrum quia earum ex. Aliquam, nobis!
                    </p>
                    <div>
                        <span class="small text-secondary d-block">Jl. Kalideres banyune banter</span>
                        <span class="small text-secondary d-block">08563828292</span>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <b class="d-block">Menu</b>
                    <a href="" class="d-block text-decoration-none small text-secondary">Beranda</a>
                    <?php foreach($pages as $data){ ?>
                        <a href="<?= Url::to(''.$data['slug'].''); ?>" class="d-block text-decoration-none small text-secondary"><?= $data['name']; ?></a>
                    <?php } ?>
                    <a href="" class="d-block text-decoration-none small text-secondary">Kebijakan Privasi</a>
                </div>
                <div class="col-md-3 mb-3">
                    <b class="d-block">Social Media</b>
                    <a href="" class="d-block text-decoration-none small text-secondary">Facebook</a>
                    <a href="" class="d-block text-decoration-none small text-secondary">Instagram</a>
                    <a href="" class="d-block text-decoration-none small text-secondary">Youtube</a>
                    <a href="" class="d-block text-decoration-none small text-secondary">LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright xsmall bg-secondary bg-opacity-10 text-secondary text-center py-3">
        <div>
            Made with 
            <span>
                <svg  xmlns="http://www.w3.org/2000/svg"  width="16"  height="16"  viewBox="0 0 24 24"  fill="#e11d48"  class="icon icon-tabler icons-tabler-filled icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" /></svg>
            </span>
        </div>
        <div>
            &copy; Hikam Abqory 2022 - <?= date('Y') ?>. All rights reserved
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
