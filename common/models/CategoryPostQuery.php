<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CategoryPost]].
 *
 * @see CategoryPost
 */
class CategoryPostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CategoryPost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CategoryPost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
