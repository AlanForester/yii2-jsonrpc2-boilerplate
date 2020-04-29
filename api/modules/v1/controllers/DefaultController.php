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
        $data = Data::findByPageUid($uid);
        if (!$data) {
            throw new \JsonRpc2\Exception('Not found',
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
        $model = Data::findByPageUid($data->uid);
        if($model) {
            $model->page_uid = $data->uid;
            $model->name = $data->name;
            $model->surname = $data->surname;
        } else {
            $model = new Data();
            $model->page_uid = $data->uid;
            $model->name = $data->name;
            $model->surname = $data->surname;
            $model->created = time();
        }
        if (!$model->save()) {
            throw new \JsonRpc2\Exception("Could not save data",
                \JsonRpc2\Exception::INTERNAL_ERROR);
        }

        return $model;
    }
}
