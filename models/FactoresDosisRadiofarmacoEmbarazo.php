<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factores_dosis_radiofarmaco_embarazo".
 *
 * @property integer $id
 * @property double $early_pregnant
 * @property double $3_meses
 * @property double $6_meses
 * @property double $9_meses
 * @property integer $id_radiofarmaco
 */
class FactoresDosisRadiofarmacoEmbarazo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factores_dosis_radiofarmaco_embarazo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['early_pregnant', '3_meses', '6_meses', '9_meses', 'id_radiofarmaco'], 'required'],
            [['early_pregnant', '3_meses', '6_meses', '9_meses'], 'number'],
            [['id_radiofarmaco'], 'integer']
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              early_pregnant LIKE              3_meses LIKE              6_meses LIKE              9_meses LIKE              id_radiofarmaco LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'early_pregnant' => 'Early Pregnant',
            '3_meses' => '3 Meses',
            '6_meses' => '6 Meses',
            '9_meses' => '9 Meses',
            'id_radiofarmaco' => 'Id Radiofarmaco',
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
            'early_pregnant' => 'Early Pregnant',
            '3_meses' => '3 Meses',
            '6_meses' => '6 Meses',
            '9_meses' => '9 Meses',
            'id_radiofarmaco' => 'Id Radiofarmaco',
        ];
    }
}
