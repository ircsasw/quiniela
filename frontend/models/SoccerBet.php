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
            'id' => Yii::t('app', 'Folio'),
            'User.name' => Yii::t('app', 'Usuario'),
            'user' => Yii::t('app', 'Usuario'),
            'date' => Yii::t('app', 'Fecha'),
            'total_points' => Yii::t('app', 'Puntaje total'),
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
    * Find the the top five bets on soccer_bet table of quinielas database and render the result at index.
    * SELECT * FROM soccer_bet ORDER BY total_points DESC LIMIT 5;
    * @return mixed
    */   
    public function getTopFiveBets(){
       return $this->find()
        ->orderBy('total_points DESC')
        ->limit(5)
        ->all();
    }

    public function getBetsTotal(){
        return $this->find()->count();
    }

    public function getBestBet(){
        return $this->find()
        ->orderBy('total_points DESC')
        ->limit(1)
        ->all();
    }

        public function getWorstBet(){
        return $this->find()
        ->orderBy('total_points ASC')
        ->limit(1)
        ->all();
    }
}
