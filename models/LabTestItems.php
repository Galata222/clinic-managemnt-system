<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab_test_items".
 *
 * @property int $id
 * @property string|null $test_item_name
 * @property string $test_item_id
 * @property string|null $test_type_id
 * @property float|null $cost
 *
 * @property LabRequest[] $labRequests
 * @property LabResult[] $labResults
 * @property LabTestTypes $testType
 */
class LabTestItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_test_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_item_id'], 'required'],
            [['cost'], 'number'],
            [['test_item_name', 'test_item_id', 'test_type_id'], 'string', 'max' => 45],
            [['test_item_id'], 'unique'],
            [['test_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LabTestTypes::class, 'targetAttribute' => ['test_type_id' => 'test_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_item_name' => 'Test Item Name',
            'test_item_id' => 'Test Item ID',
            'test_type_id' => 'Test Type ID',
            'cost' => 'Cost',
        ];
    }

    /**
     * Gets query for [[LabRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabRequests()
    {
        return $this->hasMany(LabRequest::class, ['lab_test_item_id' => 'test_item_id']);
    }

    /**
     * Gets query for [[LabResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabResults()
    {
        return $this->hasMany(LabResult::class, ['lab_test_item_id' => 'test_item_id']);
    }

    /**
     * Gets query for [[TestType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestType()
    {
        return $this->hasOne(LabTestTypes::class, ['test_type_id' => 'test_type_id']);
    }
}
