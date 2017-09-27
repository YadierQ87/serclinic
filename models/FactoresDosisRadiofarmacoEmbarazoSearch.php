<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FactoresDosisRadiofarmacoEmbarazo;

/**
 * FactoresDosisRadiofarmacoEmbarazoSearch represents the model behind the search form about `app\models\FactoresDosisRadiofarmacoEmbarazo`.
 */
class FactoresDosisRadiofarmacoEmbarazoSearch extends FactoresDosisRadiofarmacoEmbarazo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_radiofarmaco'], 'integer'],
            [['early_pregnant', '3_meses', '6_meses', '9_meses'], 'number'],
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
        $query = FactoresDosisRadiofarmacoEmbarazo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'early_pregnant' => $this->early_pregnant,
            '3_meses' => $this->3_meses,
            '6_meses' => $this->6_meses,
            '9_meses' => $this->9_meses,
            'id_radiofarmaco' => $this->id_radiofarmaco,
        ]);

        return $dataProvider;
    }
}
