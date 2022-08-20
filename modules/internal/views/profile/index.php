<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\internal\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Користувачі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Створити профіль користувача', ['create'], ['class' => 'btn btn-success btn-block']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'user_id',
            //'image',
            'first_name',
            'second_name',
            //'middle_name',
            //'subject',
            //'place',
            //'colege',
            //'year',
            //'degree',
            'phone',
            //'price',
            //'experience',
            //'level',
            'adress',
            'status_id',
            //'content:ntext',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>
