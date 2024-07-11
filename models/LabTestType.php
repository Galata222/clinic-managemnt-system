<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_lab_test_type".
 *
 * @property int $id
 * @property string|null $type
 * @property int|null $status
 *
 * @property LabRequest[] $labRequests
 * @property LabResult[] $labResults
 * @property LabTest[] $labTests
 * @property TestItem[] $testItems
 */
class LabTestType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_lab_test_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'status'], 'integer'],
            [['type'], 'string', 'max' => 45],
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
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[LabRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabRequests()
    {
        return $this->hasMany(LabRequest::class, ['fk_lab_test_type' => 'id']);
    }

    /**
     * Gets query for [[LabResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabResults()
    {
        return $this->hasMany(LabResult::class, ['fk_lab_test_type' => 'id']);
    }

    /**
     * Gets query for [[LabTests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabTests()
    {
        return $this->hasMany(LabTest::class, ['fk_test_type' => 'id']);
    }

    /**
     * Gets query for [[TestItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestItems()
    {
        return $this->hasMany(TestItem::class, ['fk_lab_test_type' => 'id']);
    }
}
