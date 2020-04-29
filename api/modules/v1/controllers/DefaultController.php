<?php

namespace app\modules\v1\controllers;

use \JsonRpc2\Controller;
use \app\models\Data;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{


    /**
     * Function get data
     * @param $uid string
     * @return Data
     * @throws \JsonRpc2\Exception
     */
    public function actionGet($uid)
    {
        $data = Data::findById($uid);
        if (!$data) {
            throw new \JsonRpc2\extensions\AuthException('Missing data',
                \JsonRpc2\Exception::INTERNAL_ERROR);
        }
        return $data;
    }


    /**
     * Function insert data or update record if exists
     * @param $data \app\modules\v1\dto\Data
     * @return Data
     * @throws \JsonRpc2\Exception
     */
    public function actionInsert($data)
    {
        $isNew = false;
        $model = Data::findById($data->uid);
        if($model) {
            $model->id = $data->uid;
            $model->name = $data->name;
            $model->surname = $data->surname;
        } else {
            $model = new Data();
            $model->id = $data->uid;
            $model->name = $data->name;
            $model->surname = $data->surname;
            $model->created_ts = time();
            $isNew = true;
        }
        if (!$model->save()) {
            throw new \JsonRpc2\Exception("Could not save data",
                \JsonRpc2\Exception::INTERNAL_ERROR);
        }

        return $model;
    }
}
