<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m210116_060734_questions
 */
class m210116_060734_questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('questions', [
            'questionID' => Schema::TYPE_PK,
            'questionText' => Schema::TYPE_TEXT,
            'fromID' => Schema::TYPE_INTEGER,
            'toID' => Schema::TYPE_INTEGER,
            'isAnonymous' => Schema::TYPE_BOOLEAN,
            'askedAt' => Schema::TYPE_TIMESTAMP
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210116_060734_questions cannot be reverted.\n";

        return $this->dropTable('questions');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210116_060734_questions cannot be reverted.\n";

        return false;
    }
    */
}
