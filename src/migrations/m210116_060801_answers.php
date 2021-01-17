<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Class m210116_060801_answers
 */
class m210116_060801_answers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('answers', [
            'answerID' => Schema::TYPE_PK,
            'answerText' => Schema::TYPE_TEXT,
            'questionID' => Schema::TYPE_INTEGER,
            'answeredAt' => Schema::TYPE_TIMESTAMP
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210116_060801_answers cannot be reverted.\n";

        return $this->dropTable('answers');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210116_060801_answers cannot be reverted.\n";

        return false;
    }
    */
}
