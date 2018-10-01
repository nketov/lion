<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $phone;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [                  
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['phone', 'required'],
            ['phone', 'string', 'min' => 9, 'message' => 'Неверный номер'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    public function attributeLabels()
    {
        return [

            'email' => 'E-mail',
            'phone' => 'Телефон'
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();      
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
