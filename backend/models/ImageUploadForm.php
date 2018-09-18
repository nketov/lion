<?php
namespace app\models;

use yii\base\Model;
use yii\helpers\Url;
use yii\web\UploadedFile;

class ImageUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $image1;
    public $image2;
    public $code;

    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'string'],
            [['image1','image2'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'code' => 'Код товара',
            'image1' => 'Изображение №1',
            'image2' => 'Изображение №2',
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            if($this->image1)
            $this->image1->saveAs(Url::to('@frontend/web/images/uploads/') . \str_replace('/','_____',$this->code.'_1'));
            if($this->image2)
            $this->image2->saveAs(Url::to('@frontend/web/images/uploads/') . \str_replace('/','_____',$this->code.'_2'));
            return true;
        } else {
            return false;
        }
    }
}