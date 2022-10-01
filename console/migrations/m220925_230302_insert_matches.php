<?php

use yii\db\Migration;

/**
 * Class m220925_230302_insert_matches
 */
class m220925_230302_insert_matches extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('@console/migrations/sql/m220925_230302.sql')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('TRUNCATE matches');
    }
}
