<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\Area */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити населений пункт', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
        <?= Html::a('Видалити населений пункт', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-block',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Створити населений пункт', ['create'], ['class' => 'btn btn-success btn-block']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'state_id',
            'title',
        ],
    ]) ?>

</div>
