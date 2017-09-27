<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfRefrigeradores;

/**
 * CfRefrigeradoresSearch represents the model behind the search form about `app\models\CfRefrigeradores`.
 */
class CfRefrigeradoresSearch extends CfRefrigeradores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Temperatura_refrigerador', 'fecha_refrigerador', 'temperatura_congelador', 'fecha_congelador', 'temperatura_freezer', 'fecha_freezer'], 'safe'],
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
        $query = CfRefrigeradores::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_refrigerador' => $this->fecha_refrigerador,
            'fecha_congelador' => $this->fecha_congelador,
            'fecha_freezer' => $this->fecha_freezer,
        ]);

        $query->orFilterWhere(['like', 'Temperatura_refrigerador', $params])
            ->orFilterWhere(['like', 'temperatura_congelador', $params])
            ->orFilterWhere(['like', 'temperatura_freezer', $params]);

        return $dataProvider;
    }
}
