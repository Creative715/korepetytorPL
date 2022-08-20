<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'second_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?php // echo $form->field($model, 'sub_id') ?>

    <?php // echo $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'place') ?>

    <?php // echo $form->field($model, 'colege') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'degree') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'experience') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
