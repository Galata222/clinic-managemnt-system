<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drug_store".
 *
 * @property int $id
 * @property int $drug_id
 * @property string|null $drug_name
 * @property float|null $drug_cost
 * @property string|null $expiry_date
 * @property int|null $status
 *
 * @property PatientPrescription[] $patientPrescriptions
 */
class DrugStore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drug_store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'drug_id'], 'required'],
            [['id', 'drug_id', 'status'], 'integer'],
            [['drug_cost'], 'number'],
            [['expiry_date'], 'safe'],
            [['drug_name'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drug_id' => 'Drug ID',
            'drug_name' => 'Drug Name',
            'drug_cost' => 'Drug Cost',
            'expiry_date' => 'Expiry Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[PatientPrescriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPrescriptions()
    {
        return $this->hasMany(PatientPrescription::class, ['drug_names' => 'drug_name']);
    }
}
