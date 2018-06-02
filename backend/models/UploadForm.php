<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
/**
* @var UploadedFile
*/
public $excelFile;

public function rules()
{
return [
[['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx','checkExtensionByMimeType'=>false],
];
}

public function upload()
{
if ($this->validate()) {
$this->excelFile->saveAs('uploads/excel' . '.' . $this->excelFile->extension);
return true;
} else {
return false;
}
}
}