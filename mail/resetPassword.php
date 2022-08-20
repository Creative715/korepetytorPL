<?php

/**
 * @var $this yii\web\View
 * @var $user app\models\User
 */

use yii\helpers\Html;

echo 'Привіт '.Html::encode($user->username).'. ';
echo Html::a('Для зміни паролю перейдіть за цим посиланням.',
    Yii::$app->urlManager->createAbsoluteUrl(
        [
            '/site/reset-password',
            'key' => $user->secret_key
        ]
    ));