<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "docarea".
 *
 * @property int $id
 * @property int $id_area
 * @property int $id_doc
 */
class Docarea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docarea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_area', 'id_doc', 'id_bran', 'type'], 'required'],
            [['id_area', 'id_doc', 'id_bran'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_area' => 'Номер участка',
            'id_doc' => 'ФИО врача',
            'id_bran' => 'Отделение',
            'type' => 'Тип',
        ];
    }

    public function getArea(){
        return $this->hasOne(Area::className(), ['id' => 'id_area']);
    }

    public function getDoctor(){
        return $this->hasMany(Doctor::className(), ['id' => 'id_doc']);
    }
    public function getBranches(){
        return $this->hasOne(Branches::className(), ['id' => 'id_bran']);
    }
}
