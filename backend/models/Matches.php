<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "matches".
 *
 * @property int $id
 * @property string $date
 * @property string $round
 * @property int $team_a_id
 * @property int $score_a
 * @property int $team_b_id
 * @property int $score_b
 * @property string $notes
 */
class Matches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['team_a_id', 'score_a', 'team_b_id', 'score_b'], 'integer'],
            [['notes'], 'string'],
            [['round'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Fecha'),
            'round' => Yii::t('app', 'Ronda'),
            'team_a_id' => Yii::t('app', 'Equipo A ID'),
            'score_a' => Yii::t('app', 'Puntaje A'),
            'team_b_id' => Yii::t('app', 'Equipo B ID'),
            'score_b' => Yii::t('app', 'Puntaje B'),
            'notes' => Yii::t('app', 'Notas'),
        ];
    }

    public function getTeamNameA()
    {
        return $this->hasOne(Teams::className(), ['id' => 'team_a_id']);
    }

    public function getTeamNameB()
    {
        return $this->hasOne(Teams::className(), ['id' => 'team_b_id']);
    }
}