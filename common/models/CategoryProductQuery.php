<?php

namespace common\models;
use creocoder\nestedsets\NestedSetsQueryBehavior;
/**
 * This is the ActiveQuery class for [[CategoryProduct]].
 *
 * @see CategoryProduct
 */
class CategoryProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/
    public function behaviors() {
        return [
            NestedSetsQueryBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     * @return CategoryProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CategoryProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
