<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FactoresDosisRadiofarmaco;

/**
 * FactoresDosisRadiofarmacoSearch represents the model behind the search form about `app\models\FactoresDosisRadiofarmaco`.
 */
class FactoresDosisRadiofarmacoSearch extends FactoresDosisRadiofarmaco
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_radiofarmaco'], 'integer'],
            [['organo_critico'], 'safe'],
            [['dosis_efectiva_0a2', 'dosis_efectiva_3a7', 'dosis_efectiva_8a12', 'dosis_efectiva_13a18', 'dosis_efectiva_hombre', 'dosis_efectiva_mujer', 'dosis_org_crit_0a2', 'dosis_org_crit_3a7', 'dosis_org_crit_8a12', 'dosis_org_crit_13a18', 'dosis_org_crit_hombre', 'dosis_org_crit_mujer'], 'number'],
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
        $query = FactoresDosisRadiofarmaco::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_radiofarmaco' => $this->id_radiofarmaco,
            'dosis_efectiva_0a2' => $this->dosis_efectiva_0a2,
            'dosis_efectiva_3a7' => $this->dosis_efectiva_3a7,
            'dosis_efectiva_8a12' => $this->dosis_efectiva_8a12,
            'dosis_efectiva_13a18' => $this->dosis_efectiva_13a18,
            'dosis_efectiva_hombre' => $this->dosis_efectiva_hombre,
            'dosis_efectiva_mujer' => $this->dosis_efectiva_mujer,
            'dosis_org_crit_0a2' => $this->dosis_org_crit_0a2,
            'dosis_org_crit_3a7' => $this->dosis_org_crit_3a7,
            'dosis_org_crit_8a12' => $this->dosis_org_crit_8a12,
            'dosis_org_crit_13a18' => $this->dosis_org_crit_13a18,
            'dosis_org_crit_hombre' => $this->dosis_org_crit_hombre,
            'dosis_org_crit_mujer' => $this->dosis_org_crit_mujer,
        ]);

        $query->andFilterWhere(['like', 'organo_critico', $this->organo_critico]);

        return $dataProvider;
    }
}
