<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property int $parent
 * @property string $content
 * @property string $image
 * @property double $price
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'alias', 'parent', 'content', 'price'], 'required'],
            [['parent'], 'integer'],
            [['content'], 'string'],
            [['price'], 'number'],
            [['title', 'alias', 'image'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'parent' => 'Parent',
            'content' => 'Content',
            'image' => 'Image',
            'price' => 'Price',
        ];
    }
}
