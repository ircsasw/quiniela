<?php

use yii\db\Migration;

/**
 * Class m220705_222421_alter_matches_table
 */
class m220705_222421_alter_matches_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('@console/migrations/sql/m220705_222421.sql')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute(file_get_contents(Yii::getAlias('@console/migrations/sql/m220705_222421.sql')));
    }
}
