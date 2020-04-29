<?php

namespace app\controllers;

use app\models\DataForm;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * Displays index page.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new DataForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($data = $model->sendRequest()) {
                Yii::$app->session->setFlash('dataFormSubmitted');
                return $this->refresh();
            }
        }
        $model->httpRequestData();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays http page.
     *
     * @return string
     */
    public function actionHttp()
    {
        $model = new DataForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($data = $model->sendRequest()) {
                Yii::$app->session->setFlash('dataFormSubmitted');
                return $this->refresh();
            }
        }
        $model->httpRequestData();
        return $this->render('http', [
            'model' => $model,
        ]);
    }

}
