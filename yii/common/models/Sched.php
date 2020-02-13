<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sched".
 *
 * @property int $id
 * @property int $id_bran
 * @property int $id_doc
 * @property int $id_prof
 * @property int $id_area
 * @property int $id_cab
 * @property string $data_start
 * @property string $data_end
 * @property string $monday_begin
 * @property string $monday_end
 * @property string $tuesday_begin
 * @property string $tuesday_end
 * @property string $wednesday_begin
 * @property string $wednesday_end
 * @property string $thursday_begin
 * @property string $thursday_end
 * @property string $friday_begin
 * @property string $friday_end
 * @property string $saturday_begin
 * @property string $saturday_end
 * @property string $sunday_begin
 * @property string $sunday_end
 *
 * @property Schedtime[] $schedtimes
 */
class Sched extends \yii\db\ActiveRecord
{
    public $active;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sched';
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
            [['id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab', 'type', 'data_start', 'data_end'], 'required'],
            [['id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab'], 'integer'],
            [['data_start', 'data_end'], 'safe'],
            [['monday_begin', 'monday_end', 'tuesday_begin', 'tuesday_end', 'wednesday_begin', 'wednesday_end', 'thursday_begin', 'thursday_end', 'friday_begin', 'friday_end', 'saturday_begin', 'saturday_end', 'sunday_begin', 'sunday_end'], 'string', 'max' => 10],
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
            'id_area' => 'Участок',
            'id_cab' => 'Кабинет',
            'type' => 'Тип',
            'data_start' => 'с',
            'data_end' => 'по',
            'monday_begin' => 'Monday Begin',
            'monday_end' => 'Monday End',
            'tuesday_begin' => 'Tuesday Begin',
            'tuesday_end' => 'Tuesday End',
            'wednesday_begin' => 'Wednesday Begin',
            'wednesday_end' => 'Wednesday End',
            'thursday_begin' => 'Thursday Begin',
            'thursday_end' => 'Thursday End',
            'friday_begin' => 'Friday Begin',
            'friday_end' => 'Friday End',
            'saturday_begin' => 'Saturday Begin',
            'saturday_end' => 'Saturday End',
            'sunday_begin' => 'Sunday Begin',
            'sunday_end' => 'Sunday End',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedtimes()
    {
        return $this->hasMany(Schedtime::className(), ['id_sched' => 'id']);
    }




/*
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $schedtime = new \common\models\Schedtime();
        $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');
        $schedtime->id_sched = $this->id;
        $schedtime->id_cab = $this->id_cab;
        $schedtime->data_start = $this->data_start;
        $schedtime->data_end = $this->data_end;
        $schedtime->monday_begin = $this->monday_begin;
        $schedtime->monday_end = $this->monday_end;
            if (!empty($schedtime->monday_begin)) {
                $day_number = 1;
                for ($i = strtotime($days[$day_number], strtotime($schedtime->data_start)); $i <= strtotime($schedtime->data_end); $i = strtotime('+1 week', $i))
                    $dateM[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateM); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_cab', 'data', 'time_start', 'time_end'], [
                        ['NULL', $schedtime->id_sched, $schedtime->id_cab, $dateM[$i], $schedtime->monday_begin, $schedtime->monday_end],
                    ])->execute();
                }
            }

            /*
            // если мы создаем нового пользователя, тогда нам необходимо создать
            // для него запись в таблице профиля с ссылкой на родительскую таблицу
            $schedtime = new \common\models\Schedtime();
            $schedtime->id_sched = $this->id;
            $schedtime->id_cab = $this->id_cab;
            $schedtime->data_start = $this->data_start;
            $schedtime->data_end = $this->data_end;
            $schedtime->monday_begin = $this->monday_begin;
            $schedtime->monday_end = $this->monday_end;
            $schedtime->tuesday_begin = $this->tuesday_begin;
            $schedtime->tuesday_end = $this->tuesday_end;
            $schedtime->wednesday_begin = $this->wednesday_begin;
            $schedtime->wednesday_end = $this->wednesday_end;
            $schedtime->thursday_begin = $this->thursday_begin;
            $schedtime->thursday_end = $this->thursday_end;
            $schedtime->friday_begin = $this->friday_begin;
            $schedtime->friday_end = $this->friday_end;
            $schedtime->saturday_begin = $this->saturday_begin;
            $schedtime->saturday_end = $this->saturday_end;
            $schedtime->sunday_begin = $this->sunday_begin;
            $schedtime->sunday_end = $this->sunday_end;
            echo '<pre>';
            print_r($schedtime);
            echo '</pre>';
            /*
            $schedtime->id_cab = $this->id_cab;
            $schedtime->data = $this->data;
            $schedtime->time_start = $this->time_start;
            $schedtime->time_end = $this->time_end;
            $schedtime->save();*/
            /*
            $days = array('1' => 'Monday', '2' => 'Tuesday', '3' => 'Wednesday', '4' => 'Thursday', '5' => 'Friday', '6' => 'Saturday', '7' => 'Sunday');


            if (!empty($schedtime->monday_begin)) {
                $day_number = 1;
                for ($i = strtotime($days[$day_number], strtotime($schedtime->data_start)); $i <= strtotime($schedtime->data_end); $i = strtotime('+1 week', $i))
                    $dateM[] = date('Y-m-d', $i);
                for ($i = 0; $i < count($dateM); $i++) {
                    Yii::$app->db->createCommand()->batchInsert('schedtime', ['id', 'id_sched', 'id_cab', 'data', 'time_start', 'time_end'], [
                        ['NULL', $schedtime->id_sched, $schedtime->id_cab, $dateM[$i], $schedtime->monday_begin, $schedtime->monday_end],
                    ])->execute();
                }
            }
*/


    public function receive($date){
        foreach ($date as $key => $value){
            foreach ($value as $k => $v){
                $array[] = $v;
            }
        }
        $id = implode(",", $array);
        return $id;
    }

}
