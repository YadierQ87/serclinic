<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_types_equipment".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $observation
 * @property string $datetime_r
 * @property string $username
 *
 * @property CfEquipment[] $cfEquipments
 * @property CfMedicalStudyCfTypesEquipment[] $cfMedicalStudyCfTypesEquipments
 * @property CfMedicalStudy[] $cfmedicalstudies
 */
class CfTypesEquipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_types_equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'datetime_r', 'username'], 'required'],
            [['status'], 'integer'],
            [['observation'], 'string'],
            [['datetime_r'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 255]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              name LIKE              status LIKE              observation LIKE              datetime_r LIKE              username LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'observation' => 'Observation',
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
            'name' => 'Nombre',
            'status' => 'Estado',
            'observation' => 'Observacion',
            'datetime_r' => 'Fecha Recepcion',
            'username' => 'Nombre de usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfEquipments()
    {
        return $this->hasMany(CfEquipment::className(), ['cf_types_equipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalStudyCfTypesEquipments()
    {
        return $this->hasMany(CfMedicalStudyCfTypesEquipment::className(), ['cftypesequipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfmedicalstudies()
    {
        return $this->hasMany(CfMedicalStudy::className(), ['id' => 'cfmedicalstudy_id'])->viaTable('cf_medical_study_cf_types_equipment', ['cftypesequipment_id' => 'id']);
    }
}
