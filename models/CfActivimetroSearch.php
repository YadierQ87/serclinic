<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfActivimetro;

/**
 * CfActivimetroSearch represents the model behind the search form about `app\models\CfActivimetro`.
 */
class CfActivimetroSearch extends CfActivimetro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fecha_medicion', 'hora', 'actv_fuente_patron', 'actv_estandar'], 'safe'],
            [['fondo_act'], 'number'],
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
        $query = CfActivimetro::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_medicion' => $this->fecha_medicion,
            'hora' => $this->hora,
            'fondo_act' => $this->fondo_act,
        ]);

        $query->andFilterWhere(['like', 'actv_fuente_patron', $this->actv_fuente_patron])
            ->andFilterWhere(['like', 'actv_estandar', $this->actv_estandar]);

        return $dataProvider;
    }
}
