<?php

namespace app\modules\internal\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\internal\models\Profile;

/**
 * ProfileSearch represents the model behind the search form of `app\modules\internal\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['image', 'first_name', 'second_name', 'middle_name', 'subject', 'place', 'colege', 'year', 'degree', 'phone', 'experience', 'level', 'adress', 'content'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Profile::find();

        // add conditions that should always apply here

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
            'user_id' => $this->user_id,
            'year' => $this->year,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'second_name', $this->second_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'colege', $this->colege])
            ->andFilterWhere(['like', 'degree', $this->degree])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'experience', $this->experience])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'content', $this->content]);


        return $dataProvider;
    }
}
