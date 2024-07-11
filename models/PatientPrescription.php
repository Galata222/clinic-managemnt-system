<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_prescription".
 *
 * @property int $id
 * @property string|null $prescription_id
 * @property string $patient_id
 * @property string|null $drug_names
 * @property string|null $strength
 * @property string|null $dosage
 * @property string|null $form_id
 * @property float|null $frequency
 * @property int|null $duration
 * @property int|null $quantity
 * @property string|null $how_to_use
 * @property string|null $other_info
 * @property string|null $patient_type
 * @property float|null $cost
 * @property string $created_at
 * @property int|null $status
 * @property string|null $prescribed_by
 * @property string|null $dispensed_by
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property DrugStore $drugNames
 * @property CentralTriage $patient
 */
class PatientPrescription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_prescription';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id', 'created_at'], 'required'],
            [['frequency', 'cost'], 'number'],
            [['duration', 'quantity', 'status'], 'integer'],
            [['how_to_use'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['prescription_id', 'patient_id', 'drug_names', 'strength', 'dosage', 'form_id', 'patient_type', 'prescribed_by', 'dispensed_by', 'created_by', 'updated_by'], 'string', 'max' => 45],
            [['other_info'], 'string', 'max' => 255],
            [['prescription_id'], 'unique'],
            [['drug_names'], 'exist', 'skipOnError' => true, 'targetClass' => DrugStore::class, 'targetAttribute' => ['drug_names' => 'drug_name']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => CentralTriage::class, 'targetAttribute' => ['patient_id' => 'patient_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prescription_id' => 'Prescription ID',
            'patient_id' => 'Patient ID',
            'drug_names' => 'Drug Names',
            'strength' => 'Strength',
            'dosage' => 'Dosage',
            'form_id' => 'Form ID',
            'frequency' => 'Frequency',
            'duration' => 'Duration',
            'quantity' => 'Quantity',
            'how_to_use' => 'How To Use',
            'other_info' => 'Other Info',
            'patient_type' => 'Patient Type',
            'cost' => 'Cost',
            'created_at' => 'Created At',
            'status' => 'Status',
            'prescribed_by' => 'Prescribed By',
            'dispensed_by' => 'Dispensed By',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[DrugNames]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDrugNames()
    {
        return $this->hasOne(DrugStore::class, ['drug_name' => 'drug_names']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(CentralTriage::class, ['patient_id' => 'patient_id']);
    }
}
