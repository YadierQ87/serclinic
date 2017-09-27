<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfCampana;

/**
 * CfCampanaSearch represents the model behind the search form about `app\models\CfCampana`.
 */
class CfCampanaSearch extends CfCampana
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'presion', 'flujo_aire'], 'safe'],
            [['id'], 'integer'],
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
        $query = CfCampana::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'fecha' => $this->fecha,
            'id' => $this->id,
        ]);

        $query->orFilterWhere(['like', 'presion', $params])
            ->orFilterWhere(['like', 'flujo_aire', $params]);

        return $dataProvider;
    }
}
