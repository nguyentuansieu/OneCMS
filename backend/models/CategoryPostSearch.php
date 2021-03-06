<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CategoryPost;

/**
 * CategoryPostSearch represents the model behind the search form about `common\models\CategoryPost`.
 */
class CategoryPostSearch extends CategoryPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'tree', 'lft', 'rgt', 'depth', 'published', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title', 'slug', 'image', 'content', 'meta_title', 'meta_keywords', 'meta_description', 'meta_params', 'layouts', 'views'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CategoryPost::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'tree' => $this->tree,
            'lft' => $this->lft,
            'rgt' => $this->rgt,
            'depth' => $this->depth,
            'published' => $this->published,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_params', $this->meta_params])
            ->andFilterWhere(['like', 'layouts', $this->layouts])
            ->andFilterWhere(['like', 'views', $this->views]);

        return $dataProvider;
    }
}
