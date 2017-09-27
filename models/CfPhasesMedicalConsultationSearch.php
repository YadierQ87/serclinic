<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfPhasesMedicalConsultation;

/**
 * CfPhasesMedicalConsultationSearch represents the model behind the search form about `app\models\CfPhasesMedicalConsultation`.
 */
class CfPhasesMedicalConsultationSearch extends CfPhasesMedicalConsultation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_medical_consultation_id', 'cf_process_section_id'], 'integer'],
            [['cf_process_id', 'status', 'specialist', 'datetime_w', 'datetime_r', 'username'], 'safe'],
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
        $query = CfPhasesMedicalConsultation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cf_medical_consultation_id' => $this->cf_medical_consultation_id,
            'cf_process_section_id' => $this->cf_process_section_id,
            'datetime_w' => $this->datetime_w,
            'datetime_r' => $this->datetime_r,
        ]);

        $query->andFilterWhere(['like', 'cf_process_id', $this->cf_process_id])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'specialist', $this->specialist])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
