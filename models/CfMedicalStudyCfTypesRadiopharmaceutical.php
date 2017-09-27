<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_medical_study_cf_types_radiopharmaceutical".
 *
 * @property integer $cfmedicalstudy_id
 * @property integer $cftypesradiopharmaceutical_id
 *
 * @property CfTypesRadiopharmaceutical $cftypesradiopharmaceutical
 * @property CfMedicalStudy $cfmedicalstudy
 */
class CfMedicalStudyCfTypesRadiopharmaceutical extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_medical_study_cf_types_radiopharmaceutical';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cfmedicalstudy_id', 'cftypesradiopharmaceutical_id'], 'required'],
            [['cfmedicalstudy_id', 'cftypesradiopharmaceutical_id'], 'integer']
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             cfmedicalstudy_id LIKE              cftypesradiopharmaceutical_id LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'cfmedicalstudy_id' => 'Cfmedicalstudy ID',
            'cftypesradiopharmaceutical_id' => 'Cftypesradiopharmaceutical ID',
        ];       
    }*/

  /* fin de los echos por mi */

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cfmedicalstudy_id' => 'Cfmedicalstudy ID',
            'cftypesradiopharmaceutical_id' => 'Cftypesradiopharmaceutical ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCftypesradiopharmaceutical()
    {
        return $this->hasOne(CfTypesRadiopharmaceutical::className(), ['id' => 'cftypesradiopharmaceutical_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfmedicalstudy()
    {
        return $this->hasOne(CfMedicalStudy::className(), ['id' => 'cfmedicalstudy_id']);
    }
}
