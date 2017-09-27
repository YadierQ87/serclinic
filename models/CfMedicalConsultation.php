<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_medical_consultation".
 *
 * @property integer $id
 * @property integer $cf_medical_study_id
 * @property integer $cf_patient_id
 * @property string $date_turn
 * @property string $hour_turn
 * @property integer $off_calendar
 * @property string $doctor_makes_referral_id
 * @property string $doctor_makes_referral_name
 * @property string $doctor_makes_referral_email
 * @property string $hospital_makes_referral_name
 * @property string $date_remission
 * @property double $size
 * @property double $weight
 * @property string $indication
 * @property string $price
 * @property string $status
 * @property string $causes
 * @property integer $is_external
 * @property string $age
 * @property string $observation
 * @property string $datetime_w
 * @property string $datetime_r
 * @property string $estado_externo
 * @property string $username
 * @property string $specialist
 * @property integer $bajopeso
 * @property integer parent_id
 * @property integer $sobrepeso
 * @property CfAcquireImage[] $cfAcquireImages
 * @property CfAdministerDoses[] $cfAdministerDoses
 * @property CfPatient $cfPatient
 * @property CfMedicalStudy $cfMedicalStudy
 * @property CfPrepareDoses[] $cfPrepareDoses
 * @property CfProcessing[] $cfProcessings
 * @property CfReception[] $cfReceptions
 * @property CfReport[] $cfReports
 * @property CfSubmit[] $cfSubmits
 */
class CfMedicalConsultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_medical_consultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_study_id', 'cf_patient_id', 'off_calendar', 'is_external','bajopeso','sobrepeso','parent_id'], 'integer'],
            [[ 'status', 'datetime_r', 'username', 'specialist','cf_patient_id','cf_medical_study_id',
                'doctor_makes_referral_name','hospital_makes_referral_name','date_remission'], 'required'],
            [[ 'hour_turn', 'date_turn','date_remission', 'datetime_w', 'datetime_r','estado_externo'], 'safe'],
            [['indication', 'price', 'causes', 'observation', 'specialist','age','estado_externo'], 'string'],
            [['size', 'weight'], 'number'],
            [['doctor_makes_referral_id'], 'string', 'max' => 50],
            [['doctor_makes_referral_name', 'username'], 'string', 'max' => 100],
            [['doctor_makes_referral_email', 'hospital_makes_referral_name', 'status'], 'string', 'max' => 255],

        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'No. Turno',
            'cf_medical_study_id' => 'Estudio Medico',
            'cf_patient_id' => 'Paciente',
            'date_turn' => 'Fecha del turno',
            'hour_turn' => 'Hora del turno',
            'off_calendar' => 'Fuera de calendario',
            'doctor_makes_referral_id' => 'Doctor Makes Referral ID',
            'doctor_makes_referral_name' => 'Doctor que remite',
            'doctor_makes_referral_email' => 'Correo del doctor que remite',
            'hospital_makes_referral_name' => 'Hospital',
            'date_remission' => 'Fecha de remision',
            'size' => 'Talla (cm)',
            'weight' => 'Peso (kg)',
            'indication' => 'Indicaciones',
            'price' => 'Precio',
            'status' => 'Estado',
            'causes' => 'Causas',
            'is_external' => 'Es externo (Remision)',
            'age' => 'Edad',
            'observation' => 'Observacion',
            'datetime_w' => 'Fecha W',
            'datetime_r' => 'Fecha R',
            'username' => 'Nombre de usuario',
            'specialist' => 'Especialista que recibe',
            'bajopeso'=>'Bajo Peso',
            'sobrepeso'=>'Sobre Peso',
            'estado_externo'=>'Proceso Externo',
            'parent_id' => 'parent_id'
            //'dosificado'=>'dosificado'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getMyImc(){
        $edad = explode(" ",$this->age);
        $IMC = 0;
        if($edad[0] < 18 && stristr($this->age, 'os')){
            //calculo segun dosis para ninnos
            $IMC = 1;
        }
        if($edad[0] > 18 && stristr($this->age, 'os')){
            //calculo IMC
            $tamanno = $this->size/100;
            $IMC = $this->weight/pow($tamanno,2);
        }
        return round($IMC,2);
    }

    //devuelve e listado de imagenes...
    public function getCfAcquireImageAcquireStudy()
    {
        return $this->hasOne(CfImageAcquireStudy::className(), ['cf_medical_consultation_id' => 'id']);
    }

    public function getCfImages()
    {
        return $this->hasOne(CfAcquireImage::className(), ['cf_medical_consultation_id' => 'id']);
    }

    public function getEspecialista()
    {
        return $this->hasOne(CfWorker::className(), ['id' => 'specialist']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfAdministerDoses()
    {
        return $this->hasMany(CfAdministerDoses::className(), ['cf_medical_consultation_id' => 'id']);
    }

    public function getCfUniqueAdministerDoses()
    {
        return $this->hasOne(CfAdministerDoses::className(), ['cf_medical_consultation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfPatient()
    {
        return $this->hasOne(CfPatient::className(), ['id' => 'cf_patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalStudy()
    {
        return $this->hasOne(CfMedicalStudy::className(), ['id' => 'cf_medical_study_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfPrepareDoses()
    {
        return $this->hasOne(CfPrepareDoses::className(), ['cf_medical_consultation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfProcessings()
    {
        return $this->hasOne(CfProcessing::className(), ['cf_medical_consultation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfReceptions()
    {
        return $this->hasOne(CfReception::className(), ['cf_medical_consultation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfReports()
    {
        return $this->hasMany(CfReport::className(), ['cf_medical_consultation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfSubmits()
    {
        return $this->hasMany(CfSubmit::className(), ['cf_medical_consultation_id' => 'id']);
    }

    public function getAllStudiosByPatient($model){

        $searchModel = new CfMedicalConsultationSearch();
        $lista_consultas = array();
        $padreConsulta = $searchModel->searchParent($model->cfMedicalStudy->parent_id,$this->cf_patient_id);
        return $padreConsulta;
        die();

        while(is_array($padreConsulta) && count($padreConsulta)>0){
            $objPadre=CfMedicalConsultation::findOne($padreConsulta[0]["id"]);
            $lista_consultas[] = $objPadre;
            $padreConsulta= $searchModel->searchParent($objPadre->cfMedicalStudy->parent_id,$this->cf_patient_id);
        }
        return $lista_consultas;
    }



}
