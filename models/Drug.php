<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_drug".
 *
 * @property int $id
 * @property string|null $drug_name
 * @property float|null $drug_cost
 * @property string|null $expiry_date
 * @property int|null $status
 *
 * @property Prescription[] $prescriptions
 */
class Drug extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_drug';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'status'], 'integer'],
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
            'drug_name' => 'Drug Name',
            'drug_cost' => 'Drug Cost',
            'expiry_date' => 'Expiry Date',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Prescriptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrescriptions()
    {
        return $this->hasMany(Prescription::class, ['fk_drug' => 'id']);
    }
}
