<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */
$this->title = 'Forma autoryzacji';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
<br/><br/><br/>
<h1><?= Html::encode($this->title) ?></h1>
<div class="well">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password') ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Wejść', ['class' => 'btn btn-block btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    
     <?= Html::a('Zapomniały hasło?', ['/site/send-email']) ?>
     
    </div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div><!-- site-login -->
