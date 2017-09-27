<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfPatient;

/**
 * CfPatientSearch represents the model behind the search form about `app\models\CfPatient`.
 */
class CfPatientSearch extends CfPatient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_media_id', 'medical_record_id', 'notification_email', 'status'], 'integer'],
            [['personal_id', 'firstname', 'lastname', 'photo', 'up_date', 'date_birth', 'medical_record', 'email', 'telephone', 'sex', 'observation', 'nationality', 'town', 'region', 'datetime_r', 'username'], 'safe'],
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
        $query = CfPatient::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       /* if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            'id' => $params,
            'cf_media_id' => $params,
            'up_date' => $params,
            'date_birth' => $params,
            'medical_record_id' => $params,
            'notification_email' => $params,
            'status' => $params,
            'datetime_r' => $params,
        ]);

        $query->orFilterWhere(['like', 'personal_id', $params])
            ->orFilterWhere(['like', 'firstname', $params])
            ->orFilterWhere(['like', 'lastname', $params])
            ->orFilterWhere(['like', 'photo', $params])
            ->orFilterWhere(['like', 'medical_record', $params])
            ->orFilterWhere(['like', 'email', $params])
            ->orFilterWhere(['like', 'telephone', $params])
            ->orFilterWhere(['like', 'sex', $params])
            ->orFilterWhere(['like', 'observation', $params])
            ->orFilterWhere(['like', 'nationality', $params])
            ->orFilterWhere(['like', 'town', $params])
            ->orFilterWhere(['like', 'region', $params])
            ->orFilterWhere(['like', 'username', $params]);

        return $dataProvider;
    }


    public function historial($id){
        $query = CfMedicalConsultation::find();
        $query->joinWith(['cfPatient']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query->andFilterWhere([
            'cf_patient_id' => $id,

        ]);
        return $dataProvider;
    }
}
