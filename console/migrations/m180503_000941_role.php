<?php

use yii\db\Migration;

/**
 * Class m180503_000941_role
 */
class m180503_000941_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('@console/migrations/sql/m180503_000941.sql')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180503_000941_role cannot be reverted.\n";

        return false;
    }
}

