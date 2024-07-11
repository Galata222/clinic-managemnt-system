<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "central_triage".
 *
 * @property int $id
 * @property string $patient_id
 * @property string|null $patient_first_name
 * @property string|null $patient_last_name
 * @property int|null $age
 * @property string|null $gender
 * @property string|null $occupation
 * @property string|null $central_triagecol
 * @property string|null $phone_no
 * @property string|null $house_no
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property Billing $billing
 * @property LabRequest[] $labRequests
 * @property LabResult[] $labResults
 * @property PatientPrescription[] $patientPrescriptions
 * @property Triage[] $triages
 */
class CentralTriage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'central_triage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age', 'patient_first_name', 'patient_last_name', 'gender'], 'required'],
            [['age'], 'integer',],
            [['created_at', 'updated_at'], 'safe'],
            [['patient_id', 'patient_first_name', 'patient_last_name', 'gender', 'occupation', 'central_triagecol', 'phone_no', 'house_no', 'created_by', 'updated_by'], 'string', 'max' => 45],
            [['patient_id'], 'unique'],
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
            'patient_first_name' => 'Patient First Name',
            'patient_last_name' => 'Patient Last Name',
            'age' => 'Age',
            'gender' => 'Gender',
            'occupation' => 'Occupation',
            'central_triagecol' => 'Central Triagecol',
            'phone_no' => 'Phone No',
            'house_no' => 'House No',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }


    /**
     * Gets query for [[Billing]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBilling()
    {
        return $this->hasOne(Billing::class, ['' => 'patient_id']);
    }

    /**
     * Gets query for [[LabRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabRequests()
    {
        return $this->hasMany(LabRequest::class, ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[LabResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabResults()
    {
        return $this->hasMany(LabResult::class, ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[PatientPrescriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientPrescriptions()
    {
        return $this->hasMany(PatientPrescription::class, ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Triages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTriages()
    {
        return $this->hasMany(Triage::class, ['patient_id' => 'patient_id']);
    }
    public function beforeSave($insert)
    {
        if ($insert) {
            // Get the last inserted ID
            $lastRecord = self::find()->orderBy(['patient_id' => SORT_DESC])->one();

            if ($lastRecord) {
                $lastId = $lastRecord->patient_id;
                $lastNumber = substr($lastId, 3); // Extract the number part after "DLC"
                $nextNumber = str_pad((int)$lastNumber + 1, 6, '0', STR_PAD_LEFT); // Increment the number and pad with zeros

                $this->patient_id = 'HC' . $nextNumber;
            } else {
                $this->patient_id = 'HC000001'; // First record
            }
        }

        return parent::beforeSave($insert);
    }
}