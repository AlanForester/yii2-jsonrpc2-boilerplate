<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string $page_uid
 * @property int $created
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
            [['page_uid'], 'required'],
            [['created'], 'default', 'value' => null],
            [['created'], 'integer'],
            [['name', 'surname', 'page_uid'], 'string', 'max' => 255],
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
            'page_uid' => 'Page Uid',
            'created' => 'Created',
        ];
    }

    public static function findByPageUid($uid)
    {
        return Data::findOne(['page_uid' => $uid]);
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
