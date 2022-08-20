<?php


namespace app\modules\internal\controllers;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



class AppAdminController extends Controller{

public function behaviors()
     {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [

                'class' => AccessControl::className(),

                'rules' => [

                    [
                        'allow' => true,

                        'roles' => ['@']
                    ]
                ]
            ]
        ];
     }


} 