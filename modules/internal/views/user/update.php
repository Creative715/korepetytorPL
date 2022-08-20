<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\User */

$this->title = 'Оновлення користувача';
$this->params['breadcrumbs'][] = ['label' => 'Користувачі', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Оновити';
?>
<div style="height: 800px;" class="user-update">
<br/><br/>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
