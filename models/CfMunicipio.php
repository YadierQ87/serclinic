<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_municipio".
 *
 * @property integer $id
 * @property integer $id_cf_provincia
 * @property string $nombre
 * @property integer $code
 *
 * @property CfProvincias $idCfProvincia
 */
class CfMunicipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cf_provincia', 'nombre', 'code'], 'required'],
            [['id', 'id_cf_provincia', 'code'], 'integer'],
            [['nombre'], 'string', 'max' => 150]
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cf_provincia' => 'Id Cf Provincia',
            'nombre' => 'Nombre',
            'code' => 'Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCfProvincia()
    {
        return $this->hasOne(CfProvincias::className(), ['id' => 'id_cf_provincia']);
    }
}
