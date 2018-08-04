<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 */
class Currency extends \yii\db\ActiveRecord
{
    public static $currencySign= [
    'EUR' => '€',
    'USD' => '$',
    'UAH' => '₴',
    'RUR' => '₽',
];

    public static $currencyName= [
        'EUR' => 'Евро',
        'USD' => 'Доллары',
        'UAH' => 'Гривны',
        'RUR' => 'Рубли',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currency';
    }

    public static function getCurrency($currency)
    {
        return Currency::findOne(1)->{mb_strtolower($currency)};
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uah', 'usd','rur'], 'required'],
            [['uah', 'usd','rur'], 'double'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usd' => 'Доллар к Евро:',
            'uah' => 'Гривна к Евро:',
            'rur' => 'Рубль к Евро:',
        ];
    }
}
