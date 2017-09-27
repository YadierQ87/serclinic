<?php

namespace app\models;

use Yii;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfMedicalConsultation;

/**
 * CfMedicalConsultationSearch represents the model behind the search form about `app\models\CfMedicalConsultation`.
 */
class CfMedicalConsultationSearch extends CfMedicalConsultation
{

    public $date_first=null; //Agregar esta variable
    public $date_last=null; //Agregar esta variable

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_medical_study_id', 'cf_patient_id', 'off_calendar', 'is_external', 'age'], 'integer'],
            [['date_first','date_last','date_turn', 'hour_turn', 'doctor_makes_referral_id', 'doctor_makes_referral_name', 'doctor_makes_referral_email', 'hospital_makes_referral_name', 'date_remission', 'indication', 'price', 'status', 'causes', 'observation', 'datetime_w', 'datetime_r', 'username', 'specialist'], 'safe'],
            [['size', 'weight'], 'number'],
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

    // utiliza controller consulta medica
    public function search($params)
    {

        $query = CfMedicalConsultation::find();
        $query->joinWith(['cfPatient']);
        $query->joinWith(['cfMedicalStudy']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere([
            'id' => $this->id,
            'cf_patient_id' => $this->cf_patient_id,
            'cf_medical_study_id' => $this->cf_medical_study_id,
        ]);

        $query ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_id', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_name', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_email', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.hospital_makes_referral_name',$params])
            ->orFilterWhere(['like', 'cf_medical_consultation.indication', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.price', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.status', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.causes', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.observation', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.username', $params])
            ->orFilterWhere(['like', 'cf_medical_consultation.specialist', $params])
            ->orFilterWhere(['like', 'cf_patient.firstname', $params])
            ->orFilterWhere(['like', 'cf_medical_study.name', $params]);


        return $dataProvider;
    }

    // busca los del dia de hoy q no han sido recepcionados todavia
    public function searchRecepcion($params){

        $fechahoy = date('Y-m-d');
        $this->date_first=$fechahoy;
        $this->date_last=$fechahoy;

        if(!empty($params)){
           $fechas=explode('-',$params);
            $this->date_first=$fechas[0];
            $this->date_last=$fechas[1];
        }

        $query = CfMedicalConsultation::find() ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query
            ->orFilterWhere(['status'=>'Creado'])->orFilterWhere(['status'=>'Pospuesto'])->andFilterWhere(['>=', 'date_turn', $this->date_first])
            ->andFilterWhere(['<=', 'date_turn', $this->date_last])
        ;
        return $dataProvider;

    }

    //Busqueda recepcion (search)
    public function searchBusqueda($params){

        if(!empty($params[0])) {
            $fechas = explode('-', $params[0]);
            $this->date_first = $fechas[0];
            $this->date_last = $fechas[1];
        }
        if(empty($this->date_first)){
            $fechahoy = date('Y-m-d');
            $this->date_first=$fechahoy;
            $this->date_last=$fechahoy;
        }

        // var_dump($this->date_last,$this->date_first);die;
        $query = CfMedicalConsultation::find() ;
        $query->joinWith(['cfPatient']);
        $query->joinWith(['cfMedicalStudy']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere([
            'id' => $this->id,
            'cf_patient_id' => $this->cf_patient_id,
            'cf_medical_study_id' => $this->cf_medical_study_id,
        ]);


        $query
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_id', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_name', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_email', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.hospital_makes_referral_name',$params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.indication', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.price', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.causes', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.observation', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.username', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.specialist', $params[2]])
            ->orFilterWhere(['like', 'cf_patient.firstname', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_study.name', $params[2]])
            ->andFilterWhere(['>=', 'date_turn', $this->date_first])->andFilterWhere(['<=', 'date_turn', $this->date_last])
            ->andWhere("cf_medical_consultation.status = 'Pospuesto' OR cf_medical_consultation.status = 'Creado' ");


        return $dataProvider;

    }

    // Busca x status

    public function searchStatus($params){

        if(!empty($params[0])){
            $fechas=explode('-',$params[0]);
            $this->date_first=$fechas[0];
            $this->date_last=$fechas[1];
        }

        $query = CfMedicalConsultation::find() ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $query
            ->orFilterWhere(['status'=>$params[1]])->andFilterWhere(['>=', 'date_turn', $this->date_first])
            ->andFilterWhere(['<=', 'date_turn', $this->date_last])
        ;
        return $dataProvider;
    }

    // Buscar(search) status

    public function searchSearch($params){

        if(!empty($params[0])) {
            $fechas = explode('-', $params[0]);
            $this->date_first = $fechas[0];
            $this->date_last = $fechas[1];
        }
        $query = CfMedicalConsultation::find() ;
        $query->joinWith(['cfPatient']);
        $query->joinWith(['cfMedicalStudy']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere([
            'id' => $this->id,
            'cf_patient_id' => $this->cf_patient_id,
            'cf_medical_study_id' => $this->cf_medical_study_id,
        ]);


        $query
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_id', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_name', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.doctor_makes_referral_email', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.hospital_makes_referral_name',$params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.indication', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.price', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.causes', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.observation', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.username', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_consultation.specialist', $params[2]])
            ->orFilterWhere(['like', 'cf_patient.firstname', $params[2]])
            ->orFilterWhere(['like', 'cf_medical_study.name', $params[2]])
            ->andFilterWhere(['>=', 'date_turn', $this->date_first])->andFilterWhere(['<=', 'date_turn', $this->date_last])
            ->andWhere("cf_medical_consultation.status = '$params[1]'");


        return $dataProvider;

    }

    public function searchParent($padre,$patient){
        $query = CfMedicalConsultation::find() ;
        $query->joinWith(['cfPatient']);
        $query->joinWith(['cfMedicalStudy']);

        $query->andFilterWhere([
            'cf_patient_id' => $patient,
            'cf_medical_study_id' => $padre,
        ]);
        $query->andWhere("cf_medical_consultation.status != 'Cerrado' OR cf_medical_consultation.status != 'Rechazado' ");
        return $query->asArray()->all();

    }


    public function searchEstudios($date){

            $rows = (new \yii\db\Query())
                ->select(['cf_medical_study.name', 'count(*) as num'])
                ->from('cf_medical_consultation')
                ->innerJoin('cf_medical_study','cf_medical_study_id=cf_medical_study.id')
                ->where(['date_turn'=>$date])
                ->groupBy('cf_medical_study_id')
                ->all();
            return $rows;

    }




}
