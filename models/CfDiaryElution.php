<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_diary_elution".
 *
 * @property integer $id
 * @property string $elution_datetime
 * @property string $codigo_generator
 * @property double $activity_elution
 * @property double $volumen_elution
 * @property double $activity99Mo
 * @property double $percent_radiocoloides
 * @property double $aluminio
 * @property double $ph
 * @property string $aspecto_organoleptico
 */
class CfDiaryElution extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_diary_elution';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['elution_datetime', 'codigo_generator', 'activity_elution', 'volumen_elution',
                'activity99Mo','elution_datetime' ], 'required'],
            [['percent_radiocoloides', 'aluminio', 'ph', 'aspecto_organoleptico'], 'safe'],
            [['activity_elution', 'volumen_elution', 'activity99Mo', 'percent_radiocoloides', 'aluminio', 'ph'], 'number'],
            [['codigo_generator'], 'string', 'max' => 150],
            [['aspecto_organoleptico'], 'string', 'max' => 200]
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'elution_datetime' => 'Fecha de Elucion',
            'codigo_generator' => 'Codigo Generador',
            'activity_elution' => 'Activity Elucion (GBq)',
            'volumen_elution' => 'Volumen Elucion (mL)',
            'activity99Mo' => 'Actividad 99Mo (KBq)',
            'percent_radiocoloides' => '% Radiocoloides',
            'aluminio' => 'Aluminio',
            'ph' => 'pH',
            'aspecto_organoleptico' => 'Aspecto Organoleptico',
        ];
    }
}
