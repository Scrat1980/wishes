<?php

namespace app\models\forms;

use app\models\UploadConfig;
use yii\base\Model;
use yii\web\UploadedFile;

class CreateWishForm extends ImageUploadForm
{
    public UploadedFile|string|null $imageFile = '';
    public UploadConfig $uploadConfig;
    public int|string|null $user_id = null;
    public int|string|null $wish_list_id = null;
    public ?string $name = null;
    public ?string $description = null;
    public ?string $link = null;
    public ?string $price = null;
    public ?string $is_secret = null;

    public function rules(): array
    {
        return [
            [['user_id', 'wish_list_id', 'name', 'description', 'link', 'price', 'is_secret'], 'safe'],
            [['price'], 'integer', 'min' => 0],
        ];
    }


}