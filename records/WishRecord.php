<?php

namespace app\records;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "wish".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $wish_list_id
 * @property string|null $photo_path
 * @property string|null $name
 * @property string|null $description
 * @property string|null $link
 * @property int|null $price
 * @property int|null $is_secret
 */
class WishRecord extends ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'wish_list_id', 'photo_path', 'name', 'description', 'link', 'price', 'is_secret'], 'default', 'value' => null],
            [['user_id', 'wish_list_id', 'price', 'is_secret'], 'integer'],
            [['photo_path', 'name', 'description', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'wish_list_id' => 'Wish List ID',
            'photo_path' => 'Photo Path',
            'name' => 'Name',
            'description' => 'Description',
            'link' => 'Link',
            'price' => 'Price',
            'is_secret' => 'Is Secret',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WishQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WishQuery(get_called_class());
    }

}
