<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\internal\models\CommentsRatingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments Ratings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-rating-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comments Rating', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'comment_id',
            'created_by',
            'updated_by',
            'created_at',
            //'updated_at',
            //'ip',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
