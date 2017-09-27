<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_reception".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property double $size
 * @property double $weight
 * @property string $specialist
 * @property string $observation
 * @property string $status
 * @property string $causes
 * @property string $username
 * @property string $datetime_w
 * @property string $datetime_r
 *
 * @property CfMedicalConsultation $cfMedicalConsultation
 */
class CfReception extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_reception';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id'], 'integer'],
            [['size', 'weight'], 'number'],
            [['specialist', 'observation', 'status', 'causes'], 'string'],
            [['status', 'username', 'datetime_w', 'datetime_r'], 'required'],
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
            'size' => 'Size',
            'weight' => 'Weight',
            'specialist' => 'Specialist',
            'observation' => 'Observation',
            'status' => 'Status',
            'causes' => 'Causes',
            'username' => 'Username',
            'datetime_w' => 'Datetime W',
            'datetime_r' => 'Datetime R',
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
