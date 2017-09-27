<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_hospital".
 *
 * @property integer $id
 * @property string $nombre
 */
class CfHospital extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_hospital';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 25]
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
