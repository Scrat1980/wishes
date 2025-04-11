<?php

namespace app\models\forms;

use app\models\UploadConfig;
use app\records\UserRecord;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\db\Exception;
use yii\web\UploadedFile;

class ImageUploadForm extends Model
{
    public ?string $photo_path = null;
    public UploadedFile|string|null $imageFile = '';
    public UploadConfig $uploadConfig;
    public function __construct()
    {
        $this->uploadConfig = new UploadConfig();
        parent::__construct();
    }

    public function rules(): array
    {
        return [
            [
                ['imageFile'],
                'file',
                'skipOnEmpty' => true,
                'extensions' => 'png, jpg, jpeg',
            ],
        ];
    }

    /**
     * @throws Exception
     */
    public function savePhoto(): string
    {
        if ($this->imageFile) {
            $this->photo_path = $this->uploadConfig->getNameForDb($this->imageFile);
            $fileNameForFileSystem = $this->uploadConfig->getNameForFileSystem($this->imageFile);
            $this->imageFile->saveAs($fileNameForFileSystem);
            chmod($fileNameForFileSystem, 0777);
        }

        return $this->photo_path ?? '';
    }

}