<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PatientPrescription;

/**
 * PatientPrescriptionSearch represents the model behind the search form of `app\models\PatientPrescription`.
 */
class PatientPrescriptionSearch extends PatientPrescription
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'form_id', 'duration', 'quantity', 'status'], 'integer'],
            [['prescription_id', 'patient_id', 'drug_names', 'strength', 'dosage', 'how_to_use', 'other_info', 'patient_type', 'created_at', 'prescribed_by', 'dispensed_by', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['frequency', 'cost'], 'number'],
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
        $query = PatientPrescription::find();

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
            'form_id' => $this->form_id,
            'frequency' => $this->frequency,
            'duration' => $this->duration,
            'quantity' => $this->quantity,
            'cost' => $this->cost,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'prescription_id', $this->prescription_id])
            ->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'drug_names', $this->drug_names])
            ->andFilterWhere(['like', 'strength', $this->strength])
            ->andFilterWhere(['like', 'dosage', $this->dosage])
            ->andFilterWhere(['like', 'how_to_use', $this->how_to_use])
            ->andFilterWhere(['like', 'other_info', $this->other_info])
            ->andFilterWhere(['like', 'patient_type', $this->patient_type])
            ->andFilterWhere(['like', 'prescribed_by', $this->prescribed_by])
            ->andFilterWhere(['like', 'dispensed_by', $this->dispensed_by])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
