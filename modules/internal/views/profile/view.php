<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\Profile */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Профілі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><hr/></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->user_id], ['class' => 'btn btn-block btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger btn-block ',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="profile_img">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'second_name',
            'middle_name',
            'subject:html',
            'place',
            'colege',
            'year',
            'degree',
            'phone',
            'price',
            'experience',
            'level',
            'adress',
            'content:html',
        ],
    ]) ?>

</div>
