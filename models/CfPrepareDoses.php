<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_prepare_doses".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property integer $cf_radiopharmaceutical_id
 * @property integer $cf_generator_id
 * @property double $load_doses
 * @property double $volume
 * @property string $specialist
 * @property string $observation
 * @property string $status
 * @property string $causes
 * @property string $username
 * @property string $datetime_w
 * @property string $datetime_r
 *
 * @property CfMedicalConsultation $cfMedicalConsultation
 * @property CfGenerator $cfGenerator
 * @property CfRadiopharmaceutical $cfRadiopharmaceutical
 */
class CfPrepareDoses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_prepare_doses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id', 'cf_radiopharmaceutical_id', 'cf_generator_id'], 'integer'],
            [['load_doses', 'volume'], 'number'],
            [['specialist', 'observation', 'status', 'causes'], 'string'],
            [['status', 'datetime_w', 'datetime_r'], 'required'],
            [['datetime_w', 'datetime_r'], 'safe'],
            [['username'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cf_medical_consultation_id' => 'Cf Medical Consultation ID',
            'cf_radiopharmaceutical_id' => 'Radiofarmaco',
            'cf_generator_id' => 'Generador',
            'load_doses' => 'Dosis Cargada (MBq)',
            'volume' => 'Volumen (mL)',
            'specialist' => 'Especialista',
            'observation' => 'Observacion',
            'status' => 'Estado',
            'causes' => 'Causas',
            'username' => 'Nombre Usuario',
            'datetime_w' => 'Fecha y Hora Cargada',
            'datetime_r' => 'Fecha R',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalConsultation()
    {
        return $this->hasOne(CfMedicalConsultation::className(), ['id' => 'cf_medical_consultation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfGenerator()
    {
        return $this->hasOne(CfGenerator::className(), ['id' => 'cf_generator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfRadiopharmaceutical()
    {
        return $this->hasOne(CfRadiopharmaceutical::className(), ['id' => 'cf_radiopharmaceutical_id']);
    }


}
