<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = $slug;
?>
<?php Pjax::begin(); ?>
<div class="container">
    <div class="section-title mb-3">
        <div class="bg-white py-3">
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <h1 class="text-capitalize"><?= $slug ?></h1>
                </div>
            </div>
        </div>
    </div>  
    <div class="section-posts mb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <?php foreach ($posts as $data) {  ?>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 mb-4">
                        <div class="card border-0 h-100">
                            <div class="card-header bg-white pb-0 border-bottom-0">
                                <h3 class="fw-semibold"><?= $data['title'] ?></h3>
                            </div>
                            <div class="card-body pb-0">
                                <div class="w-100 bg-light rounded mb-3" style="height: 250px;"></div>
                                <p class="small text-secondary">
                                    <?= $data['description'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2"></div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php Pjax::end(); ?>