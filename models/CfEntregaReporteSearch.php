<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfEntregaReporte;

/**
 * CfEntregaReporteSearch represents the model behind the search form about `app\models\CfEntregaReporte`.
 */
class CfEntregaReporteSearch extends CfEntregaReporte
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_consulta', 'id_paciente'], 'integer'],
            [['fecha_entrega', 'quien_entrega', 'quien_recibe', 'ci_quien_recibe', 'telf_quien_recibe', 'direccion_quien_recibe', 'observaciones'], 'safe'],
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
        $query = CfEntregaReporte::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_consulta' => $this->id_consulta,
            'fecha_entrega' => $this->fecha_entrega,
            'id_paciente' => $this->id_paciente,
        ]);

        $query->andFilterWhere(['like', 'quien_entrega', $this->quien_entrega])
            ->andFilterWhere(['like', 'quien_recibe', $this->quien_recibe])
            ->andFilterWhere(['like', 'ci_quien_recibe', $this->ci_quien_recibe])
            ->andFilterWhere(['like', 'telf_quien_recibe', $this->telf_quien_recibe])
            ->andFilterWhere(['like', 'direccion_quien_recibe', $this->direccion_quien_recibe])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
