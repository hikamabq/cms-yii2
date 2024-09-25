<?php

use app\commands\Helpers;
use app\modules\admin\models\pages\Pages;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\pages\PagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>
<h3><?= Html::encode($this->title) ?></h3>
<div class="pages-index bg-white rounded p-3 shadow-sm">

    <p>
        <?= Html::a('Create Pages', ['create'], ['class' => 'btn btn-sm py-2 px-4 btn-dark']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '{items}{summary}{pager}',
        'tableOptions' => [
            'class' => 'table-custom'
        ],
        'columns' => [
            [
                'headerOptions' => [
                    'style' => 'width:40px; min-width:40px; max-width:40px;'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
                'header' => '',
                'class' => 'yii\grid\SerialColumn'
            ],
            'name',
            [
                'attribute' => 'slug',
                'value' => function($model){
                    return '/'.$model->slug;
                }
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function($model){
                    return Helpers::type($model->type);
                }
            ],
            // 'type',
            // 'created_at',
            // 'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Pages $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
