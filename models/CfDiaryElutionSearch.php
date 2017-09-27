<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfDiaryElution;

/**
 * CfDiaryElutionSearch represents the model behind the search form about `app\models\CfDiaryElution`.
 */
class CfDiaryElutionSearch extends CfDiaryElution
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['elution_datetime', 'codigo_generator', 'aspecto_organoleptico'], 'safe'],
            [['activity_elution', 'volumen_elution', 'activity99Mo', 'percent_radiocoloides', 'aluminio', 'ph'], 'number'],
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
        $query = CfDiaryElution::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'elution_datetime' => $this->elution_datetime,
            'activity_elution' => $this->activity_elution,
            'volumen_elution' => $this->volumen_elution,
            'activity99Mo' => $this->activity99Mo,
            'percent_radiocoloides' => $this->percent_radiocoloides,
            'aluminio' => $this->aluminio,
            'ph' => $this->ph,
        ]);

        $query->andFilterWhere(['like', 'codigo_generator', $this->codigo_generator])
            ->andFilterWhere(['like', 'aspecto_organoleptico', $this->aspecto_organoleptico]);

        return $dataProvider;
    }
}
