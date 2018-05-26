<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Bet;

/**
 * BetSearch represents the model behind the search form of `frontend\models\Bet`.
 */
class BetSearch extends Bet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'soccer_bet_id', 'match_id', 'score_a', 'score_b', 'points'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Bet::find();

        // add conditions that should always apply here
        $query->where(['<=', 'id', 48]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'soccer_bet_id' => $this->soccer_bet_id,
            'match_id' => $this->match_id,
            'score_a' => $this->score_a,
            'score_b' => $this->score_b,
            'points' => $this->points,
        ]);

        return $dataProvider;
    }
}
