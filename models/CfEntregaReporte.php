<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_entrega_reporte".
 *
 * @property integer $id
 * @property string $fecha_entrega
 * @property string $quien_entrega
 * @property string $quien_recibe
 * @property string $ci_quien_recibe
 * @property string $telf_quien_recibe
 * @property string $direccion_quien_recibe
 * @property string $observaciones
 * @property integer $id_cf_medical_consultation
 */
class CfEntregaReporte extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_entrega_reporte';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_entrega', 'quien_entrega', 'quien_recibe', 'ci_quien_recibe','id_cf_medical_consultation'], 'required'],
            [['fecha_entrega','observaciones','telf_quien_recibe','direccion_quien_recibe'], 'safe'],
            [['observaciones'], 'string'],
            [['id_cf_medical_consultation'], 'integer'],
            [['quien_entrega', 'quien_recibe', 'ci_quien_recibe', 'telf_quien_recibe', 'direccion_quien_recibe'], 'string', 'max' => 250]
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_entrega' => 'Fecha Entrega',
            'quien_entrega' => 'Quien Entrega',
            'quien_recibe' => 'Quien Recibe',
            'ci_quien_recibe' => 'Ci Quien Recibe',
            'telf_quien_recibe' => 'Telf Quien Recibe',
            'direccion_quien_recibe' => 'Direccion Quien Recibe',
            'observaciones' => 'Observaciones',
            'id_cf_medical_consultation' => 'Id Cf Medical Consultation',
        ];
    }
}
