<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfPrepareDoses;

/**
 * CfPrepareDosesSearch represents the model behind the search form about `app\models\CfPrepareDoses`.
 */
class CfPrepareDosesSearch extends CfPrepareDoses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_medical_consultation_id', 'cf_radiopharmaceutical_id', 'cf_generator_id'], 'integer'],
            [['load_doses', 'volume'], 'number'],
            [['specialist', 'observation', 'status', 'causes', 'username', 'datetime_w', 'datetime_r'], 'safe'],
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
        $query = CfPrepareDoses::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       /* if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cf_medical_consultation_id' => $this->cf_medical_consultation_id,
            'cf_radiopharmaceutical_id' => $this->cf_radiopharmaceutical_id,
            'cf_generator_id' => $this->cf_generator_id,
            'load_doses' => $this->load_doses,
            'volume' => $this->volume,
            'datetime_w' => $this->datetime_w,
            'datetime_r' => $this->datetime_r,
        ]);
*/
        $query->orFilterWhere(['like', 'specialist', $params])
            ->orFilterWhere(['like', 'observation', $params])
            ->orFilterWhere(['like', 'status', $params])
            ->orFilterWhere(['like', 'causes', $params])
            ->orFilterWhere(['like', 'username', $params]);

        return $dataProvider;
    }


}
