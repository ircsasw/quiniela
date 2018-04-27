<?php

use yii\db\Migration;

/**
 * Class m180427_162001_tbl_init
 */
class m180427_162001_tbl_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('console/migrations/sql/m180427_162001.sql')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180427_162001_tbl_init cannot be reverted.\n";

        return false;
    }
}
