<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Data]].
 *
 * @see DataDTO
 */
class DataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Data[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Data|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
