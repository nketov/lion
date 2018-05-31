<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "excel".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $analogs
 * @property string $cars
 * @property string $fabricator
 * @property int $quantity
 * @property string $price
 * @property string $currency
 * @property string $note
 * @property string $store
 */
class Excel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'excel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'analogs', 'cars', 'fabricator', 'currency', 'note', 'store'], 'string'],
            [['quantity'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код товара',
            'name' => 'Наименование',
            'analogs' => 'Аналоги',
            'cars' => 'Автомобили',
            'fabricator' => 'Производитель',
            'quantity' => 'Количество',
            'price' => 'Цена',
            'currency' => 'Валюта',
            'note' => 'Примечание',
            'store' => 'Склад',
        ];
    }

    public static function getAutoList(){
        $unique = array();
        $models = self::find()->all();
        foreach ($models as $model){
            $cars=array();
            if(false !== strpos($model->cars,',')){
                $cars=explode(',' ,$model->cars);
            } else {
                $cars[]=$model->cars;
            }
            $unique=array_unique (array_merge ($unique, $cars));
            sort($unique);
        }
        $result=array();
        foreach ($unique as $val){
            if (!empty($val))
            $result[trim($val)] = trim($val);
        }
        return $result;

    }


    
}
