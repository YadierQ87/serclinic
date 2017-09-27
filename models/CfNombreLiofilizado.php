<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_nombre_liofilizado".
 *
 * @property integer $id
 * @property string $nombre
 */
class CfNombreLiofilizado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_nombre_liofilizado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 250]
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
