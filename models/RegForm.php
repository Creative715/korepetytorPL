<?php

namespace app\models;

use yii\base\Model;
use Yii;

class RegForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'password'],'filter', 'filter' => 'trim'],
            [['username', 'email', 'password'],'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['username', 'unique',
                'targetClass' => User::className(),
                'message' => 'Ten login już jest zajęty.'],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'Ten e-mail już jest zajęty.'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE, 'on' => 'default'],
            ['status', 'in', 'range' =>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE
            ]],
            ['status', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'emailActivation'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Login',
            'email' => 'E-mail',
            'password' => 'Hasło'
        ];
    }

     public function reg()
    {
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if($this->scenario === 'emailActivation')
            $user->generateSecretKey();
        return $user->save() ? $user : null;
    }
    
   public function sendActivationEmail($user)
    {
        return Yii::$app->mailer->compose('activationEmail', ['user' => $user])
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name.' (Nadesłano automatycznie).'])
            ->setTo($this->email)
            ->setSubject('Aktywacja dla '.Yii::$app->name)
            ->send();
    }
    
}