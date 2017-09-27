<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_report_templates".
 *
 * @property integer $id
 * @property string $name
 * @property string $template_pre_document
 * @property string $template_document
 * @property string $template_post_document
 * @property integer $status
 * @property string $observation
 * @property string $datetime_r
 * @property string $username
 *
 * @property CfMedicalStudy[] $cfMedicalStudies
 */
class CfReportTemplates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_report_templates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'datetime_r', 'username'], 'required'],
            [['template_pre_document', 'template_document', 'template_post_document', 'observation'], 'string'],
            [['status'], 'integer'],
            [['datetime_r'], 'safe'],
            [['name', 'username'], 'string', 'max' => 100]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              name LIKE              template_pre_document LIKE              template_document LIKE              template_post_document LIKE              status LIKE              observation LIKE              datetime_r LIKE              username LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'name' => 'Name',
            'template_pre_document' => 'Template Pre Document',
            'template_document' => 'Template Document',
            'template_post_document' => 'Template Post Document',
            'status' => 'Status',
            'observation' => 'Observation',
            'datetime_r' => 'Datetime R',
            'username' => 'Username',
        ];       
    }*/

  /* fin de los echos por mi */

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'template_pre_document' => 'Modelo Pre Document',
            'template_document' => 'Modelo Document',
            'template_post_document' => 'Modelo Documento ',
            'status' => 'Estado',
            'observation' => 'Observacion',
            'datetime_r' => 'Fecha R',
            'username' => 'Nombre de usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalStudies()
    {
        return $this->hasMany(CfMedicalStudy::className(), ['cf_report_templates_id' => 'id']);
    }
}
