<?php

namespace common\models;

use yii\web\UploadedFile;
use Yii;
use yii\helpers\Url;

class ActionsContent extends \yii\db\ActiveRecord
{

    public $image;

    public static function tableName()
    {
        return 'actions_content';
    }


    public function rules()
    {
        return [
            [['text','header'], 'string'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType' => false],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Заголовок',
            'text' => 'Текст',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->image = UploadedFile::getInstance($this, 'image');
            if($this->image)
                $this->image->saveAs(Url::to('@frontend/web/images/actions/') .'action_'. $this->id);
            $this->save();
            return true;
        } else {
            return false;
        }
    }
}
