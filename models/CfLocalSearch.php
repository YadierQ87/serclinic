<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfLocal;

/**
 * CfLocalSearch represents the model behind the search form about `app\models\CfLocal`.
 */
class CfLocalSearch extends CfLocal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'observation', 'datetime_r', 'username'], 'safe'],
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
        $query = CfLocal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

      /*  if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'datetime_r' => $this->datetime_r,
        ]);*/

        $query->orFilterWhere(['like', 'name', $params])
            ->orFilterWhere(['like', 'observation', $params])
            ->orFilterWhere(['like', 'username', $params]);

        return $dataProvider;
    }
}
