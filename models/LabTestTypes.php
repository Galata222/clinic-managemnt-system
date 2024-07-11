<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab_test_types".
 *
 * @property int $id
 * @property string|null $test_type_name
 * @property string $test_type_id
 *
 * @property LabRequest $labRequest
 * @property LabResult[] $labResults
 * @property LabTestItems[] $labTestItems
 */
class LabTestTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_test_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_type_id'], 'required'],
            [['test_type_name', 'test_type_id'], 'string', 'max' => 45],
            [['test_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_type_name' => 'Test Type Name',
            'test_type_id' => 'Test Type ID',
        ];
    }

    /**
     * Gets query for [[LabRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabRequest()
    {
        return $this->hasOne(LabRequest::class, ['lab_test_type' => 'test_type_id']);
    }

    /**
     * Gets query for [[LabResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabResults()
    {
        return $this->hasMany(LabResult::class, ['lab_test_type' => 'test_type_id']);
    }

    /**
     * Gets query for [[LabTestItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabTestItems()
    {
        return $this->hasMany(LabTestItems::class, ['test_type' => 'test_type_id']);
    }
}
