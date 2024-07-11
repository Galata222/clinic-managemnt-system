<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Triage;

/**
 * TriageSearch represents the model behind the search form of `app\models\Triage`.
 */
class TriageSearch extends Triage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['patient_id', 'blood_pressure', 'pulse_rate', 'po2', 'bmi', 'gcs', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['temperature', 'resparatory_rate', 'weight'], 'number'],
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
        $query = Triage::find();

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
            'temperature' => $this->temperature,
            'resparatory_rate' => $this->resparatory_rate,
            'weight' => $this->weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'blood_pressure', $this->blood_pressure])
            ->andFilterWhere(['like', 'pulse_rate', $this->pulse_rate])
            ->andFilterWhere(['like', 'po2', $this->po2])
            ->andFilterWhere(['like', 'patient_category', $this->patient_category])
            ->andFilterWhere(['like', 'bmi', $this->bmi])
            ->andFilterWhere(['like', 'gcs', $this->gcs])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }


}