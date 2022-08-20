<?php
/**
 * @var $this yii\web\View
 * @var $user app\models\User
 */
use yii\helpers\Html;

echo 'Привіт '.Html::encode($user->username).'.';
echo Html::a('Для активації аккаунта перейдіть за цим посиланням.',
    Yii::$app->urlManager->createAbsoluteUrl(
        [
            '/site/activate-account',
            'key' => $user->secret_key
        ]
    ));
