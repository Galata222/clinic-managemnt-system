<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RadilogyRequest;

/**
 * RadilogyRequestSearch represents the model behind the search form of `app\models\RadilogyRequest`.
 */
class RadilogyRequestSearch extends RadilogyRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['radiology_request_id', 'patient_id', 'radiology_type', 'requested_by', 'performed_by', 'perform', 'LMP', 'report', 'created_at', 'updated_at'], 'safe'],
            [['cost'], 'number'],
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
        $query = RadilogyRequest::find();

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
            'id' => $this->id,
            'cost' => $this->cost,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'radiology_request_id', $this->radiology_request_id])
            ->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'radiology_type', $this->radiology_type])
            ->andFilterWhere(['like', 'requested_by', $this->requested_by])
            ->andFilterWhere(['like', 'performed_by', $this->performed_by])
            ->andFilterWhere(['like', 'perform', $this->perform])
            ->andFilterWhere(['like', 'LMP', $this->LMP])
            ->andFilterWhere(['like', 'report', $this->report]);

        return $dataProvider;
    }
}
