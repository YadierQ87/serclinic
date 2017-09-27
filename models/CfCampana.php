<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_campana".
 *
 * @property string $fecha
 * @property string $presion
 * @property string $flujo_aire
 * @property integer $id
 */
class CfCampana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_campana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'presion', 'flujo_aire'], 'required'],
            [['fecha'], 'safe'],
            [['presion', 'flujo_aire'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
            'fecha' => 'Fecha',
            'presion' => 'Presion (Pa)',
            'flujo_aire' => 'Velocidad de flujo (10-2 m/s)',
            'id' => 'ID',
        ];
    }
}
