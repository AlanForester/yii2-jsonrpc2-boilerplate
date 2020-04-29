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
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'surname' => $this->string(255),
            'page_uid' => $this->string(255)->notNull(), // MD5
            'created' => $this->integer()->notNull(),
        ]);

        $this->createIndex('page_uid_pk','{{%data}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data}}');
    }
}
