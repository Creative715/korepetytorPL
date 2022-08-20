<?php

namespace app\modules\internal\controllers;

use yii\web\Controller;

/**
 * Default controller for the `internal` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
     
     
    public function actionIndex()
    {
        return $this->render('index');
    }
}
