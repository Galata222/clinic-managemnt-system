<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prescription;

/**
 * PrescriptionSearch represents the model behind the search form of `app\models\Prescription`.
 */
class PrescriptionSearch extends Prescription
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_drug', 'duration', 'quantity', 'status', 'fk_admissinon_exam_id'], 'integer'],
            [['strength', 'dosage', 'form', 'how_to_use', 'other_info', 'patient_id', 'doctor_id', 'pharmacist_id', 'patient_type', 'prescribed_date'], 'safe'],
            [['frequency', 'price'], 'number'],
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
        $query = Prescription::find();

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
            'fk_drug' => $this->fk_drug,
            'frequency' => $this->frequency,
            'duration' => $this->duration,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'status' => $this->status,
            'prescribed_date' => $this->prescribed_date,
            'fk_admissinon_exam_id' => $this->fk_admissinon_exam_id,
        ]);

        $query->andFilterWhere(['like', 'strength', $this->strength])
            ->andFilterWhere(['like', 'dosage', $this->dosage])
            ->andFilterWhere(['like', 'form', $this->form])
            ->andFilterWhere(['like', 'how_to_use', $this->how_to_use])
            ->andFilterWhere(['like', 'other_info', $this->other_info])
            ->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'doctor_id', $this->doctor_id])
            ->andFilterWhere(['like', 'pharmacist_id', $this->pharmacist_id])
            ->andFilterWhere(['like', 'patient_type', $this->patient_type]);

        return $dataProvider;
    }
}
