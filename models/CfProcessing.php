<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_processing".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property string $specialist
 * @property string $images
 * @property string $observation
 * @property string $datetime_w
 * @property string $datetime_r
 * @property string $username
 * @property string $status
 * @property string $causes
 *
 * @property CfMedicalConsultation $cfMedicalConsultation
 */
class CfProcessing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_processing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id'], 'integer'],
            [['specialist', 'images', 'observation', 'status', 'causes'], 'string'],
            [['datetime_w', 'datetime_r', 'username', 'status'], 'required'],
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
            'specialist' => 'Especialista',
            'images' => 'Images',
            'observation' => 'Informe del Doctor',
            'datetime_w' => 'Fecha Procesado',
            'datetime_r' => 'Fecha Adquirido',
            'username' => 'Username',
            'status' => 'Status',
            'causes' => 'Causas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalConsultation()
    {
        return $this->hasOne(CfMedicalConsultation::className(), ['id' => 'cf_medical_consultation_id']);
    }


}
