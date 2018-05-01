<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teams".
 *
 * @property int $id
 * @property string $name
 * @property string $group
 * @property string $shortcut
 * @property string $flag
 */
class Teams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teams';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'group', 'shortcut'], 'required'],
            [['flag'], 'string'],
            [['name'], 'string', 'max' => 250],
            [['group', 'shortcut'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Equipo'),
            'group' => Yii::t('app', 'Grupo'),
            'shortcut' => Yii::t('app', 'Abreviación'),
            'flag' => Yii::t('app', 'Bandera'),
        ];
    }
}
