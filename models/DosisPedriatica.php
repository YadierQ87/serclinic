<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosis_pedriatica".
 *
 * @property integer $id
 * @property integer $peso_Kg
 * @property double $fraccion
 * @property double $dosis_ninno_MBq
 */
class DosisPedriatica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dosis_pedriatica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peso_Kg', 'fraccion', 'dosis_ninno_MBq'], 'required'],
            [['peso_Kg'], 'integer'],
            [['fraccion', 'dosis_ninno_MBq'], 'number']
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              peso_Kg LIKE              fraccion LIKE              dosis_ninno_MBq LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'peso_Kg' => 'Peso  Kg',
            'fraccion' => 'Fraccion',
            'dosis_ninno_MBq' => 'Dosis Ninno  Mbq',
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
            'peso_Kg' => 'Peso  Kg',
            'fraccion' => 'Fraccion',
            'dosis_ninno_MBq' => 'Dosis Ninno  Mbq',
        ];
    }
}
