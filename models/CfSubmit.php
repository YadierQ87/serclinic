<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_submit".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property string $applicant_makes_referral_data
 * @property string $observation
 * @property string $status
 * @property string $specialist
 * @property string $causes
 * @property string $username
 * @property string $datetime_w
 * @property string $datetime_r
 *
 * @property CfMedicalConsultation $cfMedicalConsultation
 */
class CfSubmit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_submit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id'], 'integer'],
            [['applicant_makes_referral_data', 'observation', 'status', 'specialist', 'causes'], 'string'],
            [['status', 'username', 'datetime_w', 'datetime_r'], 'required'],
            [['datetime_w', 'datetime_r'], 'safe'],
            [['username'], 'string', 'max' => 100]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              cf_medical_consultation_id LIKE              applicant_makes_referral_data LIKE              observation LIKE              status LIKE              specialist LIKE              causes LIKE              username LIKE              datetime_w LIKE              datetime_r LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'cf_medical_consultation_id' => 'Cf Medical Consultation ID',
            'applicant_makes_referral_data' => 'Applicant Makes Referral Data',
            'observation' => 'Observation',
            'status' => 'Status',
            'specialist' => 'Specialist',
            'causes' => 'Causes',
            'username' => 'Username',
            'datetime_w' => 'Datetime W',
            'datetime_r' => 'Datetime R',
        ];       
    }*/

  /* fin de los echos por mi */

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cf_medical_consultation_id' => 'Consulta medica ID',
            'applicant_makes_referral_data' => 'Datos de referencia',
            'observation' => 'Observacion',
            'status' => 'Estado',
            'specialist' => 'Especialista',
            'causes' => 'Causas',
            'username' => 'Nombre de usuario',
            'datetime_w' => 'Fecha W',
            'datetime_r' => 'Fecha R',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalConsultation()
    {
        return $this->hasOne(CfMedicalConsultation::className(), ['id' => 'cf_medical_consultation_id']);
    }
}
