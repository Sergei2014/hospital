<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic'], 'required'],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
        ];
    }
}
