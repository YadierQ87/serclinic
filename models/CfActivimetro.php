<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_activimetro".
 *
 * @property integer $id
 * @property string $fecha_medicion
 * @property string $hora
 * @property double $fondo_act
 * @property string $actv_fuente_patron
 * @property string $actv_estandar
 */
class CfActivimetro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_activimetro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_medicion', 'fondo_act', 'actv_fuente_patron', 'actv_estandar'], 'required'],
            [['hora'], 'safe'],
            [['fondo_act'], 'number'],
            [['actv_fuente_patron', 'actv_estandar'], 'string']
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_medicion' => 'Fecha Medicion',
            'hora' => 'Hora',
            'fondo_act' => 'Fondo Actividad',
            'actv_fuente_patron' => 'Actividad Fuente Patron',
            'actv_estandar' => 'Actividad Estandar',
        ];
    }
}
