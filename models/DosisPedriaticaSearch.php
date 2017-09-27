<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DosisPedriatica;

/**
 * DosisPedriaticaSearch represents the model behind the search form about `app\models\DosisPedriatica`.
 */
class DosisPedriaticaSearch extends DosisPedriatica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'peso_Kg'], 'integer'],
            [['fraccion', 'dosis_ninno_MBq'], 'number'],
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
        $query = DosisPedriatica::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'peso_Kg' => $this->peso_Kg,
            'fraccion' => $this->fraccion,
            'dosis_ninno_MBq' => $this->dosis_ninno_MBq,
        ]);

        return $dataProvider;
    }
}
