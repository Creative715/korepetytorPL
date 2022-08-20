<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResetPasswordForm */
/* @var $form ActiveForm */
$this->title = 'Aktywacja użytkownika';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-activateAccaunt container" style="height: 700px;padding-top: 50px;">
<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Nadesłać', ['class' => 'btn btn-primary btn-block']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-resetPassword -->
