<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfReportTemplates;

/**
 * CfReportTemplatesSearch represents the model behind the search form about `app\models\CfReportTemplates`.
 */
class CfReportTemplatesSearch extends CfReportTemplates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'template_pre_document', 'template_document', 'template_post_document', 'observation', 'datetime_r', 'username'], 'safe'],
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
        $query = CfReportTemplates::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'datetime_r' => $this->datetime_r,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'template_pre_document', $this->template_pre_document])
            ->andFilterWhere(['like', 'template_document', $this->template_document])
            ->andFilterWhere(['like', 'template_post_document', $this->template_post_document])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
