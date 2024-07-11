<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_prescription".
 *
 * @property int $id
 * @property int $fk_drug
 * @property string $strength
 * @property string $dosage
 * @property string $form
 * @property float $frequency
 * @property int $duration
 * @property int $quantity
 * @property string $how_to_use
 * @property string $other_info
 * @property float $price
 * @property string $patient_id
 * @property string $doctor_id
 * @property string $pharmacist_id
 * @property int $status
 * @property string|null $patient_type
 * @property string|null $prescribed_date
 * @property int|null $fk_admissinon_exam_id
 *
 * @property Drug $fkDrug
 * @property Patient $patient
 */
class Prescription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_prescription';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_drug', 'strength', 'dosage', 'form', 'frequency', 'duration', 'quantity', 'how_to_use', 'other_info', 'price', 'patient_id', 'doctor_id', 'pharmacist_id', 'status'], 'safe'],
            [['fk_drug', 'duration', 'quantity', 'status', 'fk_admissinon_exam_id'], 'integer'],
            [['frequency', 'price'], 'number'],
            [['prescribed_date'], 'safe'],
            [['strength', 'dosage', 'form', 'patient_id', 'doctor_id', 'pharmacist_id', 'patient_type'], 'string', 'max' => 45],
            [['how_to_use', 'other_info'], 'string', 'max' => 255],
            [['fk_drug'], 'exist', 'skipOnError' => true, 'targetClass' => Drug::class, 'targetAttribute' => ['fk_drug' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::class, 'targetAttribute' => ['patient_id' => 'patient_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_drug' => 'Drug Name',
            'strength' => 'Strength',
            'dosage' => 'Dosage',
            'form' => 'Form',
            'frequency' => 'Frequency',
            'duration' => 'Duration',
            'quantity' => 'Quantity',
            'how_to_use' => 'How To Use:',
            'other_info' => 'Other Info:',
            'price' => 'Price',
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'pharmacist_id' => 'Pharmacist ID',
            'status' => 'Status',
            'patient_type' => 'Patient Type',
            'prescribed_date' => 'Prescribed Date',
            'fk_admissinon_exam_id' => 'Admission Examination ID',
        ];
    }

    /**
     * Gets query for [[FkDrug]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkDrug()
    {
        return $this->hasOne(Drug::class, ['id' => 'fk_drug']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['patient_id' => 'patient_id']);
    }
}
