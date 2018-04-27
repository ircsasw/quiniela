<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "soccer_bet".
 *
 * @property int $id
 * @property int $user_id
 * @property string $date
 * @property int $total_points
 */
class SoccerBet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'soccer_bet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'date'], 'required'],
            [['user_id', 'total_points'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'date' => Yii::t('app', 'Date'),
            'total_points' => Yii::t('app', 'Total Points'),
        ];
    }
}
