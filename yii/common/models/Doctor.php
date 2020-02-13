<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property int $id_bran
 * @property int $id_person
 * @property int $id_prof
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    public function getBranches(){
        return $this->hasOne(Branches::className(), ['id' => 'id_bran']);
    }

    public function getPerson(){
        return $this->hasOne(Person::className(), ['id' => 'id_person']);
    }


    public function getProfession(){
        return $this->hasOne(Profession::className(), ['id' => 'id_prof']);
    }
    public function getDocarea(){
        return $this->hasMany(Docarea::className(), ['id_doc' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bran', 'id_person', 'id_prof', 'type', 'vacation'], 'required'],
            [['id_bran', 'id_person', 'id_prof', 'type', 'vacation'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_bran' => 'Отделение',
            'id_person' => 'ФИО',
            'id_prof' => 'Специальность',
            'type' => 'Тип',
            'vacation' => 'Отпуск',
        ];
    }


}
