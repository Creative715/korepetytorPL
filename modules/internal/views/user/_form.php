<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Status;


/* @var $this yii\web\View */
/* @var $model app\modules\internal\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'Активний','0'=>'Чекає на активацію']) ?>
<br/><br/><br/>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
