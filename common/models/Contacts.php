<?php

namespace common\models;

use Yii;

class Contacts extends \yii\db\ActiveRecord
{


    public static function tableName()
    {
        return 'contacts';
    }


    public function rules()
    {
        return [
            [['phone', 'text','icon'], 'safe'],

        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Телефон',
            'text' => 'Текст',
            'icon' => 'Иконка',
        ];
    }
}
