<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_planificacion_dias".
 *
 * @property integer $id
 * @property integer $day
 * @property integer $quantity
 * @property integer $id_cf_med_study
 */
class CfPlanificacionDias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_planificacion_dias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day', 'quantity', 'id_cf_med_study'], 'required'],
            [['day', 'quantity', 'id_cf_med_study'], 'integer']
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              day LIKE              quantity LIKE              id_cf_med_study LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'day' => 'Day',
            'quantity' => 'Quantity',
            'id_cf_med_study' => 'Id Cf Med Study',
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
            'day' => 'Day',
            'quantity' => 'Quantity',
            'id_cf_med_study' => 'Id Cf Med Study',
        ];
    }
}
