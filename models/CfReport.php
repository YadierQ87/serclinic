<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_report".
 *
 * @property integer $id
 * @property integer $cf_medical_consultation_id
 * @property string $specialist
 * @property string $images_selected
 * @property string $pre_document
 * @property string $document
 * @property string $post_document
 * @property string $observation
 * @property string $username
 * @property string $datetime_w
 * @property string $datetime_r
 * @property string $status
 * @property string $causes
 *
 * @property CfMedicalConsultation $cfMedicalConsultation
 */
class CfReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cf_medical_consultation_id'], 'integer'],
            [['specialist', 'pre_document', 'document', 'post_document', 'observation', 'status', 'causes'], 'string'],
            [['username', 'datetime_w', 'datetime_r', 'status'], 'required'],
            [['datetime_w', 'datetime_r'], 'safe'],
            [['images_selected'], 'string', 'max' => 255],
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
            'cf_medical_consultation_id' => 'Consulta medica ID',
            'specialist' => 'Especialista que Informa',
            'images_selected' => 'Imagenes Seleccionadas',
            'pre_document' => 'Pre Document',
            'document' => 'Document',
            'post_document' => 'Ultimas Observaciones',
            'observation' => 'Observacion',
            'username' => 'Nombre de usuario',
            'datetime_w' => 'Fecha W',
            'datetime_r' => 'Fecha R',
            'status' => 'Estado',
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

    public function getReporteCompleto()
    {
        $ArrayEstudios = array();
        $estudio = $this->cfMedicalConsultation->cfMedicalStudy;
        while($estudio->parent_id){

        }
    }

}
