<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bet".
 *
 * @property int $id
 * @property int $soccer_bet_id
 * @property int $match_id
 * @property int $score_a
 * @property int $score_b
 * @property int $points
 */
class Bet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['soccer_bet_id', 'match_id'], 'required'],
            [['soccer_bet_id', 'match_id', 'score_a', 'score_b', 'points'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'soccer_bet_id' => Yii::t('app', 'Quiniela'),
            'match_id' => Yii::t('app', 'Partido'),
            'score_a' => Yii::t('app', 'Marcador A'),
            'score_b' => Yii::t('app', 'Marcador B'),
            'points' => Yii::t('app', 'Puntaje'),
        ];
    }
}
