<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_test_item".
 *
 * @property string $id
 * @property string|null $item
 * @property string|null $normal_range
 * @property string|null $range
 * @property int|null $fk_lab_test_type
 *
 * @property LabTestType $fkLabTestType
 * @property LabRequest[] $labRequests
 * @property LabResult[] $labResults
 */
class TestItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_test_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['fk_lab_test_type'], 'integer'],
            [['id', 'item', 'normal_range', 'range'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['fk_lab_test_type'], 'exist', 'skipOnError' => true, 'targetClass' => LabTestType::class, 'targetAttribute' => ['fk_lab_test_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item' => 'Item',
            'normal_range' => 'Normal Range',
            'range' => 'Range',
            'fk_lab_test_type' => 'Fk Lab Test Type',
        ];
    }

    /**
     * Gets query for [[FkLabTestType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkLabTestType()
    {
        return $this->hasOne(LabTestType::class, ['id' => 'fk_lab_test_type']);
    }

    /**
     * Gets query for [[LabRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabRequests()
    {
        return $this->hasMany(LabRequest::class, ['fk_test_item' => 'id']);
    }

    /**
     * Gets query for [[LabResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabResults()
    {
        return $this->hasMany(LabResult::class, ['fk_test_item' => 'id']);
    }
}
