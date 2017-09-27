<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_equipment".
 *
 * @property integer $id
 * @property integer $cf_local_id
 * @property integer $cf_types_equipment_id
 * @property string $name
 * @property string $stock_number
 * @property string $mark
 * @property string $model
 * @property string $specialist
 * @property string $production_datetime
 * @property string $last_calibration_datetime
 * @property string $last_calibration_certified
 * @property integer $status
 * @property string $observation
 * @property string $can_users
 * @property string $datetime_r
 * @property string $username
 *
 * @property CfAcquireImage[] $cfAcquireImages
 * @property CfTypesEquipment $cfTypesEquipment
 * @property CfLocal $cfLocal
 */
class CfEquipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_local_id', 'cf_types_equipment_id', 'status'], 'integer'],
            [['name', 'specialist', 'status', 'datetime_r', 'username'], 'required'],
            [['production_datetime', 'last_calibration_datetime', 'datetime_r'], 'safe'],
            [['observation', 'can_users'], 'string'],
            [['name', 'stock_number', 'mark', 'model', 'last_calibration_certified'], 'string', 'max' => 100],
            [['specialist', 'username'], 'string', 'max' => 255]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              cf_local_id LIKE              cf_types_equipment_id LIKE              name LIKE              stock_number LIKE              mark LIKE              model LIKE              specialist LIKE              production_datetime LIKE              last_calibration_datetime LIKE              last_calibration_certified LIKE              status LIKE              observation LIKE              can_users LIKE              datetime_r LIKE              username LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'cf_local_id' => 'Cf Local ID',
            'cf_types_equipment_id' => 'Cf Types Equipment ID',
            'name' => 'Name',
            'stock_number' => 'Stock Number',
            'mark' => 'Mark',
            'model' => 'Model',
            'specialist' => 'Specialist',
            'production_datetime' => 'Production Datetime',
            'last_calibration_datetime' => 'Last Calibration Datetime',
            'last_calibration_certified' => 'Last Calibration Certified',
            'status' => 'Status',
            'observation' => 'Observation',
            'can_users' => 'Can Users',
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
            'cf_local_id' => 'Local ',
            'cf_types_equipment_id' => 'Tipo de equipo ',
            'name' => 'Nombre',
            'stock_number' => 'Numero de inventario',
            'mark' => 'Marca',
            'model' => 'Modelo',
            'specialist' => 'Especialista',
            'production_datetime' => 'Fecha de produccion',
            'last_calibration_datetime' => 'Ultima fecha de calibracion',
            'last_calibration_certified' => 'Ultimo certificado de calibracion',
            'status' => 'Estado',
            'observation' => 'Observacion',
            'can_users' => 'Can Users',
            'datetime_r' => 'Fecha R',
            'username' => 'Nombre de usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfAcquireImages()
    {
        return $this->hasMany(CfAcquireImage::className(), ['cf_equipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfTypesEquipment()
    {
        return $this->hasOne(CfTypesEquipment::className(), ['id' => 'cf_types_equipment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfLocal()
    {
        return $this->hasOne(CfLocal::className(), ['id' => 'cf_local_id']);
    }
}
