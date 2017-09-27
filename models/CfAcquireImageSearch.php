<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfAcquireImage;

/**
 * CfAcquireImageSearch represents the model behind the search form about `app\models\CfAcquireImage`.
 */
class CfAcquireImageSearch extends CfAcquireImage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_medical_consultation_id', 'cf_equipment_id'], 'integer'],
            [['specialist', 'observation', 'status', 'causes', 'username', 'datetime_w', 'datetime_r'], 'safe'],
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
        $query = CfAcquireImage::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cf_medical_consultation_id' => $this->cf_medical_consultation_id,
            'cf_equipment_id' => $this->cf_equipment_id,
            'datetime_w' => $this->datetime_w,
            'datetime_r' => $this->datetime_r,
        ]);

        $query->andFilterWhere(['like', 'specialist', $this->specialist])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'causes', $this->causes])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
