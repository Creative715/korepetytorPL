<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\Profile */

$this->title = 'Створення профілю користувача';
$this->params['breadcrumbs'][] = ['label' => 'Профілі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
