<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cabinet".
 *
 * @property int $id
 * @property int $id_bran
 * @property int $num
 * @property string $name_prof
 * @property int $pmsp
 */
class Cabinet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cabinet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bran', 'num', 'name_prof', 'pmsp'], 'required'],
            [['id_bran', 'num', 'pmsp'], 'integer'],
            [['name_prof'], 'string', 'max' => 100],
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
            'num' => 'Кабинет',
            'name_prof' => 'Профиль',
            'pmsp' => 'ПМСП',
        ];
    }

    public function getBranches(){
        return $this->hasOne(Branches::className(), ['id' => 'id_bran']);
    }

}
