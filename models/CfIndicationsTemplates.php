<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_indications_templates".
 *
 * @property integer $id
 * @property string $name
 * @property string $template_indication
 * @property integer $status
 * @property string $observation
 * @property string $datetime_r
 * @property string $username
 *
 * @property CfMedicalStudy[] $cfMedicalStudies
 */
class CfIndicationsTemplates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_indications_templates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'datetime_r', 'username'], 'required'],
            [['template_indication', 'observation'], 'string'],
            [['status'], 'integer'],
            [['datetime_r'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 255]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              name LIKE              template_indication LIKE              status LIKE              observation LIKE              datetime_r LIKE              username LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'name' => 'Name',
            'template_indication' => 'Template Indication',
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
            'template_indication' => 'Modelo de indicacion',
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
        return $this->hasMany(CfMedicalStudy::className(), ['cf_indications_templates_id' => 'id']);
    }
}
