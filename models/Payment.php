<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_payment".
 *
 * @property int $id
 * @property float|null $total_price
 * @property string|null $status
 * @property string $patient_id
 * @property string $account_id
 * @property string|null $date
 * @property string|null $payment_id
 *
 * @property Patient $patient
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_price'], 'number'],
            [['patient_id', 'account_id'], 'required'],
            [['date'], 'safe'],
            [['status', 'patient_id', 'account_id', 'payment_id'], 'string', 'max' => 45],
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
            'total_price' => 'Total Price per day',
            'status' => 'Status',
            'patient_id' => 'Patient ID',
            'account_id' => 'Account ID',
            'date' => 'Date',
            'payment_id' => 'Payment ID',
        ];
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
