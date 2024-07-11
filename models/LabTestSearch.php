<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LabTest;

/**
 * LabTestSearch represents the model behind the search form of `app\models\LabTest`.
 */
class LabTestSearch extends LabTest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pk_test_id', 'fk_test_type', 'fk_specimen', 'fk_result'], 'integer'],
            [['fk_patient', 'date_done', 'date_created', 'date_modified', 'result_date'], 'safe'],
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
        $query = LabTest::find();

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
            'pk_test_id' => $this->pk_test_id,
            'fk_test_type' => $this->fk_test_type,
            'fk_specimen' => $this->fk_specimen,
            'fk_result' => $this->fk_result,
            'date_done' => $this->date_done,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'result_date' => $this->result_date,
        ]);

        $query->andFilterWhere(['like', 'fk_patient', $this->fk_patient]);

        return $dataProvider;
    }
}
