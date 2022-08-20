<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\CommentsRating */

$this->title = 'Update Comments Rating: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comments-rating-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
