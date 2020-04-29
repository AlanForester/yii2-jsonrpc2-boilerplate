<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * Ws method
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->asJson([]);
    }

}
