<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\Profile */

$this->title = 'Оновлення профілю';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Оновлення профілю';
?>
<div class="profile-update">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="profile_img">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
