<?php

use app\commands\Helpers;
use app\modules\admin\models\posts\Posts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\posts\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$pages = Helpers::pages();

$this->title = $pages;
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Pjax::begin(); ?>

<h3 class="text-capitalize"><?= Html::encode($this->title) ?></h3>
<div class="posts-index bg-white rounded p-3 shadow-sm">

    <p>
        <?= Html::a('Create Posts', ['create', 'pages' => $pages], ['class' => 'btn btn-sm btn-dark py-2 px-4']) ?>
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
            // 'id_pages',
            // 'thumbnail',
            'title',
            //'slug',
            //'description:ntext',
            // 'tag',
            'author',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model){
                    return Helpers::status($model->status);
                }
            ],
            'created_at:date',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Posts $model, $key, $index, $column) use ($pages) {
                    return Url::toRoute([$action, 'p' => $pages, 'slug' => $model->slug]);
                 }
            ],
        ],
    ]); ?>


</div>

<?php Pjax::end(); ?>