<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_refrigeradores".
 *
 * @property integer $id
 * @property string $Temperatura_refrigerador
 * @property string $fecha_refrigerador
 * @property string $temperatura_congelador
 * @property string $fecha_congelador
 * @property string $temperatura_freezer
 * @property string $fecha_freezer
 */
class CfRefrigeradores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_refrigeradores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Temperatura_refrigerador', 'fecha_refrigerador', 'temperatura_congelador', 'fecha_congelador', 'temperatura_freezer', 'fecha_freezer'], 'required'],
            [['fecha_refrigerador', 'fecha_congelador', 'fecha_freezer'], 'safe'],
            [['Temperatura_refrigerador', 'temperatura_congelador', 'temperatura_freezer'], 'string', 'max' => 200]
        ];
    }
    


    public function Grafics(){
        return CfRefrigeradores::find()->orderBy('fecha_refrigerador')->all();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Temperatura_refrigerador' => 'Temperatura Refrigerador (F)',
            'fecha_refrigerador' => 'Fecha Medicion Refrigerador',
            'temperatura_congelador' => 'Temperatura Congelador (F)',
            'fecha_congelador' => 'Fecha Medicion Congelador',
            'temperatura_freezer' => 'Temperatura Freezer (F)',
            'fecha_freezer' => 'Fecha Medicion Freezer',
        ];
    }
}
