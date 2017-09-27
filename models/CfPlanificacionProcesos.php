<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_planificacion_procesos".
 *
 * @property integer $id
 * @property integer $id_cf_cod_proceso
 * @property integer $dias
 * @property integer $id_cf_med_study
 * @property integer $orden_proceso
 */
class CfPlanificacionProcesos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_planificacion_procesos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cf_cod_proceso', 'dias', 'id_cf_med_study', 'orden_proceso'], 'required'],
            [['id_cf_cod_proceso', 'dias', 'id_cf_med_study', 'orden_proceso'], 'integer']
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              id_cf_cod_proceso LIKE              dias LIKE              id_cf_med_study LIKE              orden_proceso LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'id_cf_cod_proceso' => 'Id Cf Cod Proceso',
            'dias' => 'Dias',
            'id_cf_med_study' => 'Id Cf Med Study',
            'orden_proceso' => 'Orden Proceso',
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
            'id_cf_cod_proceso' => 'Id Cf Cod Proceso',
            'dias' => 'Dias',
            'id_cf_med_study' => 'Id Cf Med Study',
            'orden_proceso' => 'Orden Proceso',
        ];
    }
}
