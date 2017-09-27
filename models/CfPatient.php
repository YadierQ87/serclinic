<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_patient".
 *
 * @property integer $id
 * @property integer $cf_media_id
 * @property string $personal_id
 * @property string $firstname
 * @property string $lastname
 * @property string $photo
 * @property string $up_date
 * @property string $date_birth
 * @property integer $medical_record_id
 * @property string $medical_record
 * @property string $email
 * @property integer $notification_email
 * @property string $telephone
 * @property string $sex
 * @property integer $status
 * @property string $observation
 * @property string $nationality
 * @property string $town
 * @property string $region
 * @property string $datetime_r
 * @property string $username
 *
 * @property CfMedicalConsultation[] $cfMedicalConsultations
 * @property CfMedia $cfMedia
 */
class CfPatient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_media_id', 'medical_record_id', 'notification_email', 'status'], 'integer'],
            [['up_date', 'date_birth', 'datetime_r'], 'safe'],
            [['medical_record', 'observation', 'nationality', 'town', 'region'], 'string'],
            [['notification_email', 'sex', 'status', 'up_date', 'username'], 'required'],
            [['personal_id'], 'string', 'max' => 50],
            [['firstname', 'lastname', 'telephone'], 'string', 'max' => 100],
            [['photo', 'email', 'username'], 'string', 'max' => 255],
            [['sex'], 'string', 'max' => 20]
        ];
    }
    


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cf_media_id' => 'Media ID',
            'personal_id' => 'CI',
            'firstname' => 'Nombre',
            'lastname' => 'Apellido',
            'photo' => 'Foto',
            'up_date' => 'Fecha acta',
            'date_birth' => 'Fecha Nacimiento',
            'medical_record_id' => 'No Historia clinica',
            'medical_record' => 'Historia clinica',
            'email' => 'Correo',
            'notification_email' => 'Notificacion por correo',
            'telephone' => 'Telefono',
            'sex' => 'Sexo',
            'status' => 'Estado',
            'observation' => 'Observacion',
            'nationality' => 'Nacionalidad',
            'town' => 'Ciudad',
            'region' => 'Region',
            'datetime_r' => 'Fecha registro',
            'username' => 'Nombre de usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalConsultations()
    {
        return $this->hasMany(CfMedicalConsultation::className(), ['cf_patient_id' => 'id']);
    }

    public function getFullname()
    {
        return $this->firstname." ".$this->lastname;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedia()
    {
        return $this->hasOne(CfMedia::className(), ['id' => 'cf_media_id']);
    }

    public function getProvincia()
    {
        return $this->hasOne(CfProvincias::className(), ['id' => 'town']);
    }

    public function getEdad()
    {
        $datetime1 = date_create(date('Y-m-d'));
        $datetime2 = date_create($this->date_birth);
        $interval = date_diff($datetime1, $datetime2);
        $dias_diferencia = abs($interval->format('%R%a'));
        if($dias_diferencia >= 365){
            $dias_diferencia = floor($dias_diferencia/365);
            $dias_diferencia = $dias_diferencia . ' a&ntilde;os';
        }
        else if($dias_diferencia > 45 && $dias_diferencia < 365){
            $dias_diferencia = floor($dias_diferencia/30);
            $dias_diferencia  = $dias_diferencia . ' meses';
        }
        else if($dias_diferencia <= 45){
            $dias_diferencia = $dias_diferencia . ' d&iacute;as';
        }
        return $dias_diferencia;
    }




}
