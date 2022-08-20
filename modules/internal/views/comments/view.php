<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\Comments */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Коментарі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-block',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'url:url',
            //'model',
            //'model_key',
            //'main_parent_id',
            //'parent_id',
            'email:email',
            'username',
            'content:html',
            //'language',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
            'ip',
            //'status',
        ],
    ]) ?>

</div>
