<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\Comments */

$this->title = 'Оновити коментар: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Коментарі', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
