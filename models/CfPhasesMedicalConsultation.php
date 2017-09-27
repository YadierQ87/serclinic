<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_phases_medical_consultation".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property string $cf_process_id
 * @property integer $cf_process_section_id
 * @property string $status
 * @property string $specialist
 * @property string $datetime_w
 * @property string $datetime_r
 * @property string $username
 */
class CfPhasesMedicalConsultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_phases_medical_consultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id', 'cf_process_id', 'cf_process_section_id', 'status', 'datetime_w', 'datetime_r', 'username'], 'required'],
            [['cf_medical_consultation_id', 'cf_process_section_id'], 'integer'],
            [['cf_process_id', 'status', 'specialist'], 'string'],
            [['datetime_w', 'datetime_r'], 'safe'],
            [['username'], 'string', 'max' => 100]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              cf_medical_consultation_id LIKE              cf_process_id LIKE              cf_process_section_id LIKE              status LIKE              specialist LIKE              datetime_w LIKE              datetime_r LIKE              username LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'cf_medical_consultation_id' => 'Cf Medical Consultation ID',
            'cf_process_id' => 'Cf Process ID',
            'cf_process_section_id' => 'Cf Process Section ID',
            'status' => 'Status',
            'specialist' => 'Specialist',
            'datetime_w' => 'Datetime W',
            'datetime_r' => 'Datetime R',
            'username' => 'Username',
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
            'cf_process_id' => 'Proceso ID',
            'cf_process_section_id' => 'Seccion del proceso ID',
            'status' => 'Estado',
            'specialist' => 'Especialista',
            'datetime_w' => 'Fecha W',
            'datetime_r' => 'Fecha R',
            'username' => 'Nombre de usuario',
        ];
    }
}
