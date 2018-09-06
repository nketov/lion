<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "actions".
 *
 * @property int $id
 * @property string $email
 * @property string $code
 * @property int $discount
 */
class Actions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'code', 'discount'], 'required'],
            [['code'], 'string'],
            [['discount'], 'integer'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер акции',
            'email' => 'E-mail',
            'code' => 'Код товара',
            'discount' => 'Скидка',
        ];
    }

    public static function getDiscounts()
    {
        $discounts=[];

        if (Yii::$app->user->isGuest) return $discounts;
        
        $actions=Actions::findAll(['email'=>Yii::$app->user->identity->email]);

        foreach ($actions as $action){
            $discounts[trim($action->code)]=$action->discount;
        }

        return $discounts;
    }

}
