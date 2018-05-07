<?php

namespace frontend\models;

use Yii;
use common\models\User;
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
            'User.name' => Yii::t('app', 'ID del usuario'),
            'date' => Yii::t('app', 'Fecha'),
            'total_points' => Yii::t('app', 'Puntaje total'),
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
