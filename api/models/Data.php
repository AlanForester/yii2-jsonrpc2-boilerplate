<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "data".
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $surname
 * @property int $created_ts
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','created_ts'], 'required'],
            [['created_ts'], 'default', 'value' => null],
            [['created_ts'], 'integer'],
            [['id'], 'string', 'max' => 32],
            [['name', 'surname'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'created_ts' => 'Created Ts',
        ];
    }

    public static function findById($id)
    {
        return Data::findOne(['id' => $id]);
    }

    /**
     * {@inheritdoc}
     * @return DataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataQuery(get_called_class());
    }
}
