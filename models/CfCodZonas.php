<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_cod_zonas".
 *
 * @property integer $id
 * @property string $nombre_lugar
 */
class CfCodZonas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_cod_zonas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_lugar'], 'required'],
            [['nombre_lugar'], 'string', 'max' => 150]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              nombre_lugar LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'nombre_lugar' => 'Nombre Lugar',
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
            'nombre_lugar' => 'Nombre del Lugar',
        ];
    }
}
