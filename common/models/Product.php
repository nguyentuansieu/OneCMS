<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $images
 * @property string $sku
 * @property integer $quantity
 * @property integer $price
 * @property integer $discount
 * @property string $summary
 * @property string $content
 * @property string $meta_params
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $published
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => ['title', 'slug'],
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => BlameableBehavior::className(),
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'image', 'sku'], 'required'],
            [['category_id', 'quantity', 'price', 'discount', 'published', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['images', 'summary', 'content', 'meta_params', 'specification'], 'string'],
            [['title', 'slug', 'image', 'meta_keywords', 'download'], 'string', 'max' => 255],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_description'], 'string', 'max' => 160],
            [['video'], 'string', 'max' => 100],
            [['sku'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'category_id' => Yii::t('backend', 'Category ID'),
            'title' => Yii::t('backend', 'Title'),
            'slug' => Yii::t('backend', 'Slug'),
            'image' => Yii::t('backend', 'Image'),
            'images' => Yii::t('backend', 'Images'),
            'sku' => Yii::t('backend', 'Sku'),
            'quantity' => Yii::t('backend', 'Quantity'),
            'price' => Yii::t('backend', 'Price'),
            'discount' => Yii::t('backend', 'Discount'),
            'summary' => Yii::t('backend', 'Summary'),
            'content' => Yii::t('backend', 'Content'),
            'meta_params' => Yii::t('backend', 'Meta Params'),
            'meta_title' => Yii::t('backend', 'Meta Title'),
            'meta_keywords' => Yii::t('backend', 'Meta Keywords'),
            'meta_description' => Yii::t('backend', 'Meta Description'),
            'published' => Yii::t('backend', 'Published'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'specification' => Yii::t('backend', 'Thông số kỹ thuật'),
            'download' => Yii::t('backend', 'Tải về'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
