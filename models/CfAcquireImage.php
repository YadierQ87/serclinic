<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_acquire_image".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property integer $cf_equipment_id
 * @property string $specialist
 * @property string $observation
 * @property string $status
 * @property string $causes
 * @property string $username
 * @property string $datetime_w
 * @property string $datetime_r
 *
 * @property CfMedicalConsultation $cfMedicalConsultation
 * @property CfEquipment $cfEquipment
 */
class CfAcquireImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_acquire_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id', 'cf_equipment_id'], 'integer'],
            [['specialist', 'observation', 'status', 'causes'], 'string'],
            [['status', 'username', 'fecha_hora_adquisicion','fecha_hora_inyeccion'], 'required'],
            [['datetime_w', 'datetime_r','tasa_conteo'], 'safe'],
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
            'cf_equipment_id' => 'Equipo ID',
            'specialist' => 'Especialista',
            'observation' => 'Observacion',
            'status' => 'Estado',
            'tasa_conteo' => 'Tasa de Conteo (kcps)',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfEquipment()    {
        return $this->hasOne(CfEquipment::className(), ['id' => 'cf_equipment_id']);
    }

    public function getListImgsAcquires()    {
        return $this->hasMany(CfImageAcquireStudy::className(), ['id_tbcf_acquire_image' => 'id']);
    }
}
