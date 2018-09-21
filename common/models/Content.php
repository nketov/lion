<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'phone','keywords','description'], 'required'],
            [['address', 'phone','keywords','description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адрес',
            'phone' => 'Телефон',
        ];
    }
}
