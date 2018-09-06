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
            'fabricator' => 'Произво-дитель',
            'quantity' => 'Кол-во',
            'price' => 'Цена',
            'currency' => 'Валюта',
            'store' => 'Склад',
        ];
    }

    public static function getAttrList($attr){
        $unique = array();
        $models = self::find()->all();
        foreach ($models as $model){
            $cars=array();
            if(false !== strpos($model->$attr,',')){
                $cars=explode(',' ,$model->$attr);
            } else {
                $cars[]=$model->$attr;
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

    public  function getDiscountPrice()
    {
        $discounts = Actions::getDiscounts();


        if(array_key_exists($this->code, $discounts)) {
            return round($this->price *(100-$discounts[$this->code])/100, 2);
        }
        
        if(array_key_exists('*', $discounts)) {
            return round($this->price *(100-$discounts['*'])/100, 2);
        }
        
        return $this->price;
    }

    
}
