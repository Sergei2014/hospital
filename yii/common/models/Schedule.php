<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $id_bran
 * @property int $id_doc
 * @property int $id_prof
 * @property int $id_cab
 * @property string $data
 * @property string $time_start
 * @property string $time_end
 */
class Schedule extends \yii\db\ActiveRecord
{

    public $active;
    public $data_start;
    public $data_end;
    public $monday_begin;
    public $monday_end;
    public $tuesday_begin;
    public $tuesday_end;
    public $wednesday_begin;
    public $wednesday_end;
    public $thursday_begin;
    public $thursday_end;
    public $friday_begin;
    public $friday_end;
    public $saturday_begin;
    public $saturday_end;
    public $sunday_begin;
    public $sunday_end;
    public $formCheck = [];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    public function getBranches()
    {
        return $this->hasOne(Branches::className(), ['id' => 'id_bran']);
    }

    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'id_person']);
    }

    public function getProfession()
    {
        return $this->hasOne(Profession::className(), ['id' => 'id_prof']);
    }

    public function getCabinet()
    {
        return $this->hasOne(Cabinet::className(), ['id' => 'id_cab']);
    }

    public function getArea()
    {
        return $this->hasOne(Area::className(), ['id' => 'id_area']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bran', 'id_doc', 'id_prof', 'id_cab', 'data_start', 'data_end'], 'required'],
            [['id_bran', 'id_doc', 'id_prof', 'id_cab', 'id_area'], 'integer'],
            [['time_start', 'time_end', 'data_start', 'data_end', 'monday_begin', 'monday_end', 'tuesday_begin', 'tuesday_end', 'wednesday_begin', 'wednesday_end', 'thursday_begin', 'thursday_end', 'friday_begin', 'friday_end', 'saturday_begin', 'saturday_end', 'sunday_begin', 'sunday_end'], 'safe'],
            //['monday_end', 'compare', 'compareValue' => 'monday_begin', 'operator' => '<=', 'type' => 'number', 'message' => 'Конечное время не должно быть меньше начального или равно.'],

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
            'id_doc' => 'ФИО врача',
            'id_prof' => 'Специальность',
            'id_cab' => 'Кабинет',
            'id_area' => 'Участок',
            'data' => 'Data',
            'data_start' => 'С',
            'data_end' => 'по',
            'time_start' => 'Начало',
            'time_end' => 'Конец',
        ];
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            // преобразуем формат даты для записи в БД: 01.02.1970 -> 1970-02-01
            if ($this->birthday !== null) {
                $tmp = explode('.', $this->birthday);
                $this->birthday = $tmp[2].'-'.$tmp[1].'-'.$tmp[0];
            }
            return true;
        }
        return false;
    }


}
