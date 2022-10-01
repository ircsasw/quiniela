<?php

use yii\db\Migration;

/**
 * Class m180628_214308_eighth_finals
 */
class m180628_214308_eighth_finals extends Migration
{
    /**
     * {@inheritdoc}
     */
     public function safeUp()
    {
        $this->execute(file_get_contents(Yii::getAlias('@console/migrations/sql/m180628_214308.sql')));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180628_214308_eighth_finals cannot be reverted.\n";

        return false;
    }
}
