<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_radiopharmaceutical".
 *
 * @property integer $id
 * @property integer $cf_types_radiopharmaceutical_id
 * @property string $name
 * @property string $marcage_datetime
 * @property double $marcage_activity
 * @property double $marcage_volumen
 * @property string $specialist
 * @property integer $status
 * @property integer $volumen_final
 * @property integer $observation
 * @property integer $ph
 * @property integer $aspecto_organoleptico
 * @property integer $percent_marcaje
 * @property integer $fecha_hora_calidad
 *
 * @property CfPrepareDoses[] $cfPrepareDoses
 * @property CfTypesRadiopharmaceutical $cfTypesRadiopharmaceutical
 */
class CfRadiopharmaceutical extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_radiopharmaceutical';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_types_radiopharmaceutical_id', 'status', ], 'integer'],
            [['name', 'specialist', 'status','cf_types_radiopharmaceutical_id',], 'required'],
            [['marcage_datetime','volumen_final','fecha_hora_calidad','percent_marcaje','ph','aspecto_organoleptico'], 'safe'],
            [['marcage_activity', 'marcage_volumen'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['specialist','observation'], 'string', 'max' => 255]
        ];
    }
    


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cf_types_radiopharmaceutical_id' => 'Nombre Liofilizado',
            'name' => html_entity_decode('Nombre RadioF&aacute;rmaco'),
            'marcage_datetime' => html_entity_decode('Fecha y Hora Marcaje'),
            'marcage_activity' => html_entity_decode('Actividad marcaje (GBq)'),
            'marcage_volumen' =>html_entity_decode('Volumen Marcaje (mL)'),
            'specialist' => 'Especialista que Marca',
            'status' => 'Estado',
            'volumen_final' => 'Volumen Final (mL)',
            'observation' => 'Observacion',
            'fecha_hora_calidad' => 'Fecha y hora control de calidad',
            'percent_marcaje' => 'Porciento de marcaje',
            'ph' => 'pH',
            'aspecto_organoleptico' => 'Aspecto Organoleptico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfPrepareDoses()
    {
        return $this->hasMany(CfPrepareDoses::className(), ['cf_radiopharmaceutical_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfTypesRadiopharmaceutical()
    {
        return $this->hasOne(CfTypesRadiopharmaceutical::className(), ['id' => 'cf_types_radiopharmaceutical_id']);
    }

    public function getNombreRadiopharmaceutical()
    {
        return $this->hasOne(CfNombreRadiofarmaco::className(), ['id' => 'name']);
    }

    public function getMyNombreRadiopharmaceutical()
    {
        return $this->nombreRadiopharmaceutical->nombre;
    }

    public function getEspecialista()
    {
        return $this->hasOne(CfWorker::className(), ['id' => 'specialist']);
    }
}
