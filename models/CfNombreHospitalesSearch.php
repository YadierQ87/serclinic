<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfNombreHospitales;

/**
 * CfNombreHospitalesSearch represents the model behind the search form about `app\models\CfNombreHospitales`.
 */
class CfNombreHospitalesSearch extends CfNombreHospitales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'municipio_id'], 'integer'],
            [['nombre', 'direccion'], 'safe'],
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
        $query = CfNombreHospitales::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'municipio_id' => $this->municipio_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'direccion', $this->direccion]);

        return $dataProvider;
    }
}
