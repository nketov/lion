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
            'id' => 'ID',
            'email' => 'Email',
            'code' => 'Code',
            'discount' => 'Discount',
        ];
    }
}
