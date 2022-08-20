<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\CommentsRating */

$this->title = 'Create Comments Rating';
$this->params['breadcrumbs'][] = ['label' => 'Comments Ratings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-rating-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
