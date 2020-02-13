<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedtime".
 *
 * @property int $id
 * @property int $id_sched
 * @property int $id_cab
 * @property string $data
 * @property string $time_start
 * @property string $time_end
 */
class Schedtime extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedtime';
    }

    /**
     * {@inheritdoc}
     */
    /*
    public function rules()
    {
        return [
            [['id_sched', 'id_cab', 'data', 'time_start', 'time_end'], 'required'],
            [['id_sched', 'id_cab'], 'integer'],
            [['data', 'time_start', 'time_end'], 'safe'],
        ];
    }
*/
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sched' => 'Id Sched',
            'id_cab' => 'Id Cab',
            'data' => 'Data',
            'time_start' => 'Time Start',
            'time_end' => 'Time End',
        ];
    }
}
