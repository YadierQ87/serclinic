<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfMedia;

/**
 * CfMediaSearch represents the model behind the search form about `app\models\CfMedia`.
 */
class CfMediaSearch extends CfMedia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'size', 'status'], 'integer'],
            [['name', 'file_name', 'mime_type', 'path', 'meta', 'observation'], 'safe'],
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
        $query = CfMedia::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'size' => $this->size,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'file_name', $this->file_name])
            ->andFilterWhere(['like', 'mime_type', $this->mime_type])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'meta', $this->meta])
            ->andFilterWhere(['like', 'observation', $this->observation]);

        return $dataProvider;
    }
}
