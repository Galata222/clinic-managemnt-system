<?php

namespace app\models;

use Yii;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * This is the model class for table "tbl_patient".
 *
 * @property int $id
 * @property string $patient_id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_no
 * @property string $age
 * @property string $gender
 * @property string $occupation
 * @property int|null $status
 * @property string|null $region
 * @property string|null $zone
 * @property string|null $city
 * @property string|null $kebele
 *
 * @property AdmissionExamination[] $admissionExaminations
 * @property LabTest[] $labTests
 * @property Payment[] $payments
 * @property Prescription[] $prescriptions
 */
class Patient extends \yii\db\ActiveRecord
{
    const Queue = 0;
    const Cancel = 1;
    const Check = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::Queue],
            ['status', 'in', 'range' => [self::Queue, self::Check, self::Cancel]],
            [['first_name', 'last_name', 'phone_no', 'age', 'gender', 'occupation'], 'required'],
            [['status'], 'integer'],
            [['patient_id', 'first_name', 'last_name', 'phone_no', 'age', 'gender', 'occupation', 'region', 'zone', 'city', 'kebele', 'var_month', 'var_year'], 'string', 'max' => 45],
            [['patient_id'], 'unique'],
            [['created_at'], 'safe'],
            [['phone_no'], PhoneInputValidator::className()],
            ['age', 'compare', 'compareValue' => 1, 'operator' => '>', 'message' => 'Invalid age. Please insert correct age.'],
            ['age', 'compare', 'compareValue' => 150, 'operator' => '<', 'message' => 'Invalid age. Please insert correct age.'],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_no' => 'Phone No',
            'age' => 'Age',
            'gender' => 'Gender',
            'occupation' => 'Occupation',
            'status' => 'Status',
            'region' => 'Region',
            'zone' => 'Zone',
            'city' => 'City',
            'kebele' => 'Kebele',
            'created_at' => 'Created At',
            'var_month' => 'Month',
            'var_year' => "Year",
        ];
    }

    /**
     * Gets query for [[AdmissionExaminations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmissionExaminations()
    {
        return $this->hasMany(AdmissionExamination::class, ['fk_patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[LabTests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabTests()
    {
        return $this->hasMany(LabTest::class, ['fk_patient' => 'patient_id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::class, ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[Prescriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptions()
    {
        return $this->hasMany(Prescription::class, ['patient_id' => 'patient_id']);
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

                $this->patient_id = 'DLC' . $nextNumber;
            } else {
                $this->patient_id = 'DLC000001'; // First record
            }
        }

        return parent::beforeSave($insert);
    }
    //Function below used for graph
    public function allData()
    {
        $data0 = Patient::find()->where(['var_month' => date('m'), 'var_year' => date('Y')])->count();
        $data1 = Patient::find()->where(['var_month' => date('m', strtotime("+1 month")), 'var_year' => date('Y')])->count();
        $data2 = Patient::find()->where(['var_month' => date('m', strtotime("+2 month")), 'var_year' => date('Y')])->count();
        $data3 = Patient::find()->where(['var_month' => date('m', strtotime("+3 month")), 'var_year' => date('Y')])->count();
        $data4 = Patient::find()->where(['var_month' => date('m', strtotime("+4 month")), 'var_year' => date('Y')])->count();
        $data5 = Patient::find()->where(['var_month' => date('m', strtotime("+5 month")), 'var_year' => date('Y')])->count();
        $data6 = Patient::find()->where(['var_month' => date('m', strtotime("+6 month")), 'var_year' => date('Y')])->count();
        $data7 = Patient::find()->where(['var_month' => date('m', strtotime("+7 month")), 'var_year' => date('Y')])->count();
        $data8 = Patient::find()->where(['var_month' => date('m', strtotime("+8 month")), 'var_year' => date('Y')])->count();
        $data9 = Patient::find()->where(['var_month' => date('m', strtotime("+9 month")), 'var_year' => date('Y')])->count();
        $data10 = Patient::find()->where(['var_month' => date('m', strtotime("+10 month")), 'var_year' => date('Y')])->count();
        $data11 = Patient::find()->where(['var_month' => date('m', strtotime("+11 month")), 'var_year' => date('Y')])->count();
        $part = [
            '0' => $data0,
            '1' => $data1,
            '2' => $data2,
            '3' => $data3,
            '4' => $data4,
            '5' => $data5,
            '6' => $data6,
            '7' => $data7,
            '8' => $data8,
            '9' => $data9,
            '10' => $data10,
            '11' => $data11,
        ];
        return $part;
    }
}
