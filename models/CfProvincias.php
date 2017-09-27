<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_provincias".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property CfMunicipio[] $cfMunicipios
 */
class CfProvincias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_provincias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nombre'], 'required'],
            [['id'], 'integer'],
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
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMunicipios()
    {
        return $this->hasMany(CfMunicipio::className(), ['id_cf_provincia' => 'id']);
    }
}
