<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfMedicalStudy;

/**
 * CfMedicalStudySearch represents the model behind the search form about `app\models\CfMedicalStudy`.
 */
class CfMedicalStudySearch extends CfMedicalStudy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_report_templates_id', 'cf_indications_templates_id', 'status'], 'integer'],
            [['name',  'planned_process_medical_consultation', 'administer_doses_zone', 'price', 'observation', 'datetime_r', 'username'], 'safe'],
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
        $query = CfMedicalStudy::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'sort' => false,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
       /* if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            'price' => $params,
            'name' => $params,
            'administer_doses_zone' => $params,
            'observation' => $params,
            'username' => $params,
        ]);

        $query->orFilterWhere(['like', 'name', $params])
            ->orFilterWhere(['like', 'datetime_r', $params])
            ->orFilterWhere(['like', 'administer_doses_zone', $params])
            ->orFilterWhere(['like', 'price', $params])
            ->orFilterWhere(['like', 'observation',$params])
            ->orFilterWhere(['like', 'username', $params]);
        return $dataProvider;
    }
}
