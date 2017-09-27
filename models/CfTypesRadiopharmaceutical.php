<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_types_radiopharmaceutical".
 *
 * @property integer $id
 * @property string $name
 * @property string $batch
 * @property string $internal_code
 * @property string $production_company
 * @property string $production_datetime
 * @property string $expiration_datetime
 * @property string $reception_datetime
 * @property integer $count
 * @property integer $used_count
 * @property integer $status
 * @property string $observation
 * @property string $datetime_r
 * @property string $username
 *
 * @property CfMedicalStudyCfTypesRadiopharmaceutical[] $cfMedicalStudyCfTypesRadiopharmaceuticals
 * @property CfMedicalStudy[] $cfmedicalstudies
 * @property CfRadiopharmaceutical[] $cfRadiopharmaceuticals
 */
class CfTypesRadiopharmaceutical extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_types_radiopharmaceutical';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'batch', 'production_datetime', 'expiration_datetime', 'reception_datetime',
                'count', 'used_count', 'status', 'datetime_r', 'username'], 'required'],
            [['production_datetime', 'expiration_datetime', 'reception_datetime', 'datetime_r'], 'safe'],
            [['count', 'used_count', 'status'], 'integer'],
            [['observation'], 'string'],
            [['name', 'batch', 'internal_code', 'production_company'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 255]
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre de Liofilizado',
            'batch' => 'Lote',
            'internal_code' => html_entity_decode('C&oacute;digo interno'),
            'production_company' => html_entity_decode('Compañ&iacute;a productora'),
            'production_datetime' => html_entity_decode('Fecha de Producci&oacute;n'),
            'expiration_datetime' => html_entity_decode('Fecha de Expiraci&oacute;n'),
            'reception_datetime' => html_entity_decode('Fecha de Recepci&oacute;n'),
            'count' => 'Cantidad Recepcionada (viales)',
            'used_count' => 'Cantidad utilizada',
            'status' => 'Estado',
            'observation' => 'Observaciones',
            'datetime_r' => 'Fecha Recepcionado',
            'username' => 'Nombre de usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalStudyCfTypesRadiopharmaceuticals()
    {
        return $this->hasMany(CfMedicalStudyCfTypesRadiopharmaceutical::className(), ['cftypesradiopharmaceutical_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfmedicalstudies()
    {
        return $this->hasMany(CfMedicalStudy::className(), ['id' => 'cfmedicalstudy_id'])->viaTable('cf_medical_study_cf_types_radiopharmaceutical', ['cftypesradiopharmaceutical_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfRadiopharmaceuticals()
    {
        return $this->hasMany(CfRadiopharmaceutical::className(), ['cf_types_radiopharmaceutical_id' => 'id']);
    }
}
