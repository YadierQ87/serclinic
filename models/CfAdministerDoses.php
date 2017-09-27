<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_administer_doses".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property string $zone
 * @property string $observation
 * @property string $specialist
 * @property string $status
 * @property string $causes
 * @property string $username
 * @property string $datetime_w
 * @property string $remanente
 * @property string $datetime_r
 *
 * @property CfMedicalConsultation $cfMedicalConsultation
 */
class CfAdministerDoses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_administer_doses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id'], 'integer'],
            [['zone', 'observation', 'specialist', 'status', 'causes','remanente'], 'string'],
            [['status', 'username', 'datetime_w', 'datetime_r'], 'required'],
            [['datetime_w', 'datetime_r'], 'safe'],
            [['username'], 'string', 'max' => 100]
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cf_medical_consultation_id' => 'Consulta medica ID',
            'zone' => 'Zona',
            'observation' => 'Observacion',
            'specialist' => 'Especialista que administra',
            'status' => 'Estado',
            'causes' => 'Causas del rechazo',
            'username' => 'Nombre de usuario',
            'datetime_w' => 'Fecha y Hora Administracion Dosis',
            'datetime_r' => 'Fecha R',
            'remanente' => 'Remanente en Jeringuilla',
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
