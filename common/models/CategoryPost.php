<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use creocoder\nestedsets\NestedSetsBehavior;

/**
 * This is the model class for table "category_post".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $content
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $meta_params
 * @property integer $published
 * @property string $layouts
 * @property string $views
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class CategoryPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_post';
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
            ],
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'depthAttribute' => 'depth',
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'tree', 'lft', 'rgt', 'depth', 'published', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'required'],
            [['content', 'meta_params'], 'string'],
            [['title', 'slug', 'image', 'meta_keywords'], 'string', 'max' => 255],
            [['layouts', 'views'], 'string', 'max' => 100],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_description'], 'string', 'max' => 160],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'parent_id' => Yii::t('backend', 'Parent ID'),
            'tree' => Yii::t('backend', 'Tree'),
            'lft' => Yii::t('backend', 'Lft'),
            'rgt' => Yii::t('backend', 'Rgt'),
            'depth' => Yii::t('backend', 'Depth'),
            'title' => Yii::t('backend', 'Title'),
            'slug' => Yii::t('backend', 'Slug'),
            'image' => Yii::t('backend', 'Image'),
            'content' => Yii::t('backend', 'Content'),
            'meta_title' => Yii::t('backend', 'Meta Title'),
            'meta_keywords' => Yii::t('backend', 'Meta Keywords'),
            'meta_description' => Yii::t('backend', 'Meta Description'),
            'meta_params' => Yii::t('backend', 'Meta Params'),
            'published' => Yii::t('backend', 'Published'),
            'layouts' => Yii::t('backend', 'Layouts'),
            'views' => Yii::t('backend', 'Views'),
            'created_by' => Yii::t('backend', 'Created By'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryPostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryPostQuery(get_called_class());
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}
