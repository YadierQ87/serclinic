<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_nombre_con_estudio".
 *
 * @property integer $id
 * @property integer $id_cf_medical_study
 * @property integer $id_cf_nombre_radiofarmaco
 *
 * @property CfMedicalStudy $idCfMedicalStudy
 * @property CfNombreRadiofarmaco $idCfNombreRadiofarmaco
 */
class CfNombreConEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_nombre_con_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cf_medical_study', 'id_cf_nombre_radiofarmaco'], 'required'],
            [['id_cf_medical_study', 'id_cf_nombre_radiofarmaco'], 'integer']
        ];
    }
    


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cf_medical_study' => 'Id Cf Medical Study',
            'id_cf_nombre_radiofarmaco' => 'Id Cf Nombre Radiofarmaco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCfMedicalStudy()
    {
        return $this->hasOne(CfMedicalStudy::className(), ['id' => 'id_cf_medical_study']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfNombreRadiofarmaco()
    {
        return $this->hasOne(CfNombreRadiofarmaco::className(), ['id' => 'id_cf_nombre_radiofarmaco']);
    }

    //devuelve el factor de dosis esperada para un radiofarmaco.
    public function getFactorDosis()
    {
        return $this->hasOne(FactoresDosisRadiofarmaco::className(), ['id' => 'id_cf_nombre_radiofarmaco']);
    }
}
