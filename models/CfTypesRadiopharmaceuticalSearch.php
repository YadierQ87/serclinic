<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfTypesRadiopharmaceutical;

/**
 * CfTypesRadiopharmaceuticalSearch represents the model behind the search form about `app\models\CfTypesRadiopharmaceutical`.
 */
class CfTypesRadiopharmaceuticalSearch extends CfTypesRadiopharmaceutical
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count', 'used_count', 'status'], 'integer'],
            [['name', 'batch', 'internal_code', 'production_company', 'production_datetime', 'expiration_datetime', 'reception_datetime', 'observation', 'datetime_r', 'username'], 'safe'],
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

        $query = CfTypesRadiopharmaceutical::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       /* if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            'id' => $params,
            'production_datetime' => $params,
            'expiration_datetime' => $params,
            'reception_datetime' => $params,
            'count' => $params,
            'used_count' => $params,
            'status' => $params,
            'datetime_r' => $params,
        ]);

        $query->orFilterWhere(['like', 'name', $params])
            ->orFilterWhere(['like', 'batch', $params])
            ->orFilterWhere(['like', 'internal_code', $params])
            ->orFilterWhere(['like', 'production_company', $params])
            ->orFilterWhere(['like', 'observation', $params])
            ->orFilterWhere(['like', 'username', $params]);

        return $dataProvider;
    }
}
