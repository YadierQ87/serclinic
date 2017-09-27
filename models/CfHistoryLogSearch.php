<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfHistoryLog;

/**
 * CfHistoryLogSearch represents the model behind the search form about `app\models\CfHistoryLog`.
 */
class CfHistoryLogSearch extends CfHistoryLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['entity', 'section', 'level', 'username', 'user_ip_source', 'action', 'field_name', 'old_value', 'new_value', 'datetime', 'msg'], 'safe'],
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
        $query = CfHistoryLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'datetime' => $this->datetime,
        ]);

        $query->andFilterWhere(['like', 'entity', $this->entity])
            ->andFilterWhere(['like', 'section', $this->section])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'user_ip_source', $this->user_ip_source])
            ->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'field_name', $this->field_name])
            ->andFilterWhere(['like', 'old_value', $this->old_value])
            ->andFilterWhere(['like', 'new_value', $this->new_value])
            ->andFilterWhere(['like', 'msg', $this->msg]);

        return $dataProvider;
    }
}
