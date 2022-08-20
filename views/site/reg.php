<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
$this->title = 'Forma rejestracji';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
NavBar::begin([
        'options' => [
            'class' => 'nav',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-right'],
        'items' => [

            Yii::$app->user->isGuest ? (
                ['label' => '', 'url' => ['/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/profile'], 'post')
                . Html::submitButton(
                    'Wejść do gabinetu <i class="fa fa-sign-out" aria-hidden="true"></i> (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-primary']
                    
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
<div class="site-reg container">
<br/><br/><br/>
<h1><?= Html::encode($this->title) ?></h1>
<div class="well">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Rejestrować się', ['class' => 'btn btn-block btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    <?php
    if($model->scenario === 'emailActivation'):
    ?>
    <i>*Na wskazany e - mail będzie nadesłano list dla aktywacji konto.</i>
    <?php
    endif;
    ?>
    </div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div><!-- site-reg -->
