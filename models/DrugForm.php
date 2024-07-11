<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drug_form".
 *
 * @property int $id
 * @property string|null $form
 */
class DrugForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drug_form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form' => 'Form',
        ];
    }
}
