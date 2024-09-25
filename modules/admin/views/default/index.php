<?php

use app\commands\Helpers;
use app\modules\admin\models\relawan\Relawan;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;
use yii\widgets\Pjax;
$this->title = 'Dashboard';
?>

<?php Pjax::begin(); ?>
<div class="admin-default-index">
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="p-4 bg-white text-dark rounded shadow-sm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <b class="h4">Welcome </b>
                                <p class="text-secondary">Berikut adalah statistik website anda</p>
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-center">
                                <div>
                                    <span class="bg-light p-3 rounded">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-sitemap"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M15 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M6 15v-1a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v1" /><path d="M12 9l0 3" /></svg>
                                    </span>
                                    <span class="px-3">
                                        <b><?= $pages ?> Pages</b>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-center">
                                <span class="bg-light p-3 rounded">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9h8" /><path d="M8 13h6" /><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /></svg>
                                </span>
                                <span class="px-3">
                                    <b><?= $posts ?> Posts</b>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <a href="<?= Url::to('/admin/pages') ?>">Pages</a>
                            <span class="text-secondary d-block">Fitur untuk menambah, mengubah, dan menghapus halaman website.</span>
                        </div>
                        <div class="mb-3">
                            <a href="<?= Url::to('/admin/profile') ?>">Settings</a>
                            <span class="text-secondary d-block">Fitur untuk mengatur identitas website.</span>
                        </div>
                        <div class="">
                            <a href="<?= Url::to('/admin/seo') ?>">SimpleSEO</a>
                            <span class="text-secondary d-block">Atur SEO website anda agar muncul di mesin pencarian.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Pjax::begin(); ?>