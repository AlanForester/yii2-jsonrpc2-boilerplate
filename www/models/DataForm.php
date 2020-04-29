<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\Json;
use \nizsheanez\jsonRpc\Client;

/**
 * DataForm is the model behind the contact form.
 */
class DataForm extends Model
{
    public $name;
    public $surname;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name is required
            [['name'], 'required'],
            [['name', 'surname'], 'string', 'max' => 255],
        ];
    }

    public function httpRequestData()
    {
        $client = new Client(Yii::$app->params["apiUrl"]);
        try {
            $response = $client->get(Yii::$app->requestedRoute);
        } catch (\Exception $t) {
            return;
        }
        $this->name = $response->name;
        $this->surname = $response->surname;
    }

    public function wsRequestData()
    {
        $uid = Yii::$app->requestedRoute;
        $rpc = Yii::$app->get('jsonrpc');
        $method = "get";
        try {
            //$request = $rpc->createRequest($method, [$uid]);
            //$rpc->sendRequest($request);
            //die(var_dump(Json::encode($request)));
            //$response = $rpc->readResponse();
            //return $response->result;
            $this->name = $response->name;
            $this->surname = $response->surname;
        } catch (\Exception $t) {
            return;
        }
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function sendRequest()
    {
        if ($this->validate()) {
            $client = new Client(Yii::$app->params["apiUrl"]);
            $response = $client->insert([
                'uid' => Yii::$app->requestedRoute,
                'name' => $this->name,
                'surname' => $this->surname
            ]);
            return true;
        }
        return false;
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function sendWebsocket()
    {
        if ($this->validate()) {
//            $uid = Yii::$app->requestedRoute;
//            $rpc = Yii::$app->get('jsonrpc');
//            $method = "get";
//            $request = $rpc->createRequest($method, [$uid]);
//            $rpc->sendRequest($request);
            //die(var_dump(Json::encode($request)));
            //$response = $rpc->readResponse();
            //return $response->result;
        }
        return null;
    }
}
