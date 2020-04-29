<?php

namespace app\controllers;

use app\models\DataForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
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

    /**
     * Displays page2.
     *
     * @return string
     */
    public function actionWs()
    {
        $model = new DataForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($data = $model->sendWebsocket()) {
                Yii::$app->session->setFlash('dataFormSubmitted');
                return $this->refresh();
            }
        }
        $model->wsRequestData();
        return $this->render('ws', [
            'model' => $model,
        ]);
    }
}
