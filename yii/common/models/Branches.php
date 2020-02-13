<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $id
 * @property string $bran_name
 * @property int $pmsp
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bran_name', 'pmsp'], 'required'],
            [['pmsp'], 'integer'],
            [['bran_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bran_name' => 'Наименование',
            'pmsp' => 'ПМСП',
        ];
    }
}
