<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_medical_study".
 *
 * @property integer $id
 * @property string $name
 * @property string $days_week_planned_and_amount
 * @property string $planned_process_medical_consultation
 * @property string $administer_doses_zone
 * @property string $price
 * @property integer $status
 * @property string $observation
 * @property string $datetime_r
 * @property string $username
 * @property int $parent_id
 *
 * @property CfMedicalConsultation[] $cfMedicalConsultations
 * @property CfReportTemplates $cfReportTemplates
 * @property CfIndicationsTemplates $cfIndicationsTemplates
 * @property CfMedicalStudyCfTypesEquipment[] $cfMedicalStudyCfTypesEquipments
 * @property CfTypesEquipment[] $cftypesequipments
 * @property CfMedicalStudyCfTypesRadiopharmaceutical[] $cfMedicalStudyCfTypesRadiopharmaceuticals
 * @property CfTypesRadiopharmaceutical[] $cftypesradiopharmaceuticals
 */
class CfMedicalStudy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_medical_study';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'status'], 'integer'],
            [['name',  'status', 'datetime_r', 'username','dosis_sugerida'], 'required'],
            [['administer_doses_zone', 'price', 'observation'], 'string'],
            [['datetime_r','tipo_moneda','is_dinamic','parent_id'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 255]
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre del Estudio',
            'administer_doses_zone' => 'Zona de administracion de dosis',
            'price' => 'Precio',
            'status' => 'Estado',
            'dosis_sugerida' => 'Dosis Sugerida',
            'is_dinamic' => 'Dinamico',
            'observation' => 'Observacion',
            'parent_id' => 'Continuacion de',/* para los estudios hijos */
            'datetime_r' => 'Fecha R',
            'username' => 'Nombre de usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalConsultations()
    {
        return $this->hasMany(CfMedicalConsultation::className(), ['cf_medical_study_id' => 'id']);
    }

    public function getPlanificacion_dias()
    {
        return $this->hasMany(CfPlanificacionDias::className(), ['id_cf_med_study' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentStudy()
    {
        return $this->hasOne(CfMedicalStudy::className(), ['id' => 'parent_id']);
    }


    public function getCfRadiopharmaceutical()
    {
        //return $this->hasOne(CfRadiopharmaceutical::className(), ['id' => 'cf_indications_templates_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalStudyCfTypesEquipments()
    {
        return $this->hasMany(CfMedicalStudyCfTypesEquipment::className(), ['cfmedicalstudy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCftypesequipments()
    {
        return $this->hasMany(CfTypesEquipment::className(), ['id' => 'cftypesequipment_id'])->viaTable('cf_medical_study_cf_types_equipment', ['cfmedicalstudy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalStudyCfTypesRadiopharmaceuticals()
    {
        return $this->hasMany(CfMedicalStudyCfTypesRadiopharmaceutical::className(), ['cfmedicalstudy_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCftypesradiopharmaceuticals()
    {
        return $this->hasMany(CfNombreConEstudio::className(), ['id' => 'id_cf_medical_study'])->viaTable('cf_nombre_con_estudio', ['id_cf_medical_study' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery $child
     */
    public function getChild()
    {
        return $this->hasOne(CfMedicalStudy::className(), ['id' => 'parent_id']);
    }


}
