<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m200428_162643_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data}}', [
            'id' => $this->string(32)->notNull(), // MD5
            'name' => $this->string(255),
            'surname' => $this->string(255),
            'created_ts' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('page_id_pk','{{%data}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data}}');
    }
}
