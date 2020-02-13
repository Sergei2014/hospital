<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profession".
 *
 * @property int $id
 * @property string $profession_name
 */
class Profession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profession';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['profession_name'], 'required'],
            [['profession_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profession_name' => 'Наименование специальности',
        ];
    }
}
