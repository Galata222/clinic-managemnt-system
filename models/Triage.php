<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "triage".
 *
 * @property int $id
 * @property string|null $patient_id
 * @property string|null $case index
 * @property string|null $blood_pressure
 * @property float|null $temperature
 * @property string|null $pulse_rate
 * @property float|null $resparatory_rate
 * @property float|null $weight
 * @property string|null $po2
 * @property string|null $r/r
 * @property string|null $bmi
 * @property string|null $gcs
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property CentralTriage $patient
 * @property PatientCard[] $patientCards
 */
class Triage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'triage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['patient_id'],'required'],
            [['temperature', 'resparatory_rate', 'weight'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['patient_id', 'blood_pressure', 'pulse_rate', 'po2', 'bmi', 'gcs', 'created_by', 'updated_by' ,'patient_category'], 'string', 'max' => 45],
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
            'patient_id' => 'Patient ID',
            //'case index' => 'Case Index',
            'blood_pressure' => 'Blood Pressure',
            'temperature' => 'Temperature',
            'pulse_rate' => 'Pulse Rate',
            'resparatory_rate' => 'Resparatory Rate',
            'weight' => 'Weight',
            'po2' => 'Po2',
            'patient_category' => 'Patient Category',
            'bmi' => 'Bmi',
            'gcs' => 'Gcs',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            
        ];
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

    /**
     * Gets query for [[PatientCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientCards()
    {
        return $this->hasMany(PatientCard::class, ['patient_id' => 'patient_id']);
    }
}