<?php

use yii\db\Migration;

/**
 * Class m180504_180014_defa_user
 */
class m180504_180014_defa_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('@console/migrations/sql/m180504_180014.sql')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180504_180014_defa_user cannot be reverted.\n";

        return false;
    }
}
