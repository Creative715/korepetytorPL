<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\State;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state_id')->dropDownList(ArrayHelper::map(State::find()->all(),'id','title')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-block btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
