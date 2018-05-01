<?php

use yii\db\Migration;

/**
 * Class m180501_221554_flag_query
 */
class m180501_221554_flag_query extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('console/migrations/sql/m180427_221554.sql')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180501_221554_flag_query cannot be reverted.\n";

        return false;
    }
}
