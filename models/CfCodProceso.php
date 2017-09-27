<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_cod_proceso".
 *
 * @property integer $id
 * @property string $nombre
 */
class CfCodProceso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_cod_proceso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 150]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              nombre LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'nombre' => 'Nombre',
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
            'nombre' => 'Nombre',
        ];
    }
}
