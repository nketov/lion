<?php
namespace app\models;

use yii\base\Model;
use yii\helpers\Url;
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
$this->excelFile->saveAs('uploads/excel' . '.' . $this->excelFile->extension,false);
$this->excelFile->saveAs(Url::to('@frontend/web/documents/') . 'price.' . $this->excelFile->extension);

return true;
} else {
return false;
}
}
}