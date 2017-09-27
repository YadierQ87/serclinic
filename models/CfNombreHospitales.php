<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_nombre_hospitales".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $direccion
 * @property integer $municipio_id
 *
 * @property CfMedicalConsultation[] $cfMedicalConsultations
 * @property CfMunicipio $municipio
 */
class CfNombreHospitales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_nombre_hospitales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion'], 'required'],
            [['municipio_id'], 'integer'],
            [['nombre', 'direccion'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'municipio_id' => 'Municipio ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalConsultations()
    {
        return $this->hasMany(CfMedicalConsultation::className(), ['hospital_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(CfMunicipio::className(), ['id' => 'municipio_id']);
    }
}
