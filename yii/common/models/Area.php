<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id
 * @property int $number
 * @property int $id_typearea
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'id_typearea'], 'required'],
            [['number', 'id_typearea'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер участка',
            'id_typearea' => 'Тип участка',
        ];
    }


    public function getTypearea(){
        return $this->hasOne(Typearea::className(), ['id' => 'id_typearea']);
    }

    public function getDocarea(){
        return $this->hasMany(DocArea::className(), ['id_area' => 'id']);
    }

}
