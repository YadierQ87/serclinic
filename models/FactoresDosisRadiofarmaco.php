<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "factores_dosis_radiofarmaco".
 *
 * @property integer $id
 * @property string $organo_critico
 * @property integer $id_radiofarmaco
 * @property double $dosis_efectiva_0a2
 * @property double $dosis_efectiva_3a7
 * @property double $dosis_efectiva_8a12
 * @property double $dosis_efectiva_13a18
 * @property double $dosis_efectiva_hombre
 * @property double $dosis_efectiva_mujer
 * @property double $dosis_org_crit_0a2
 * @property double $dosis_org_crit_3a7
 * @property double $dosis_org_crit_8a12
 * @property double $dosis_org_crit_13a18
 * @property double $dosis_org_crit_hombre
 * @property double $dosis_org_crit_mujer
 */
class FactoresDosisRadiofarmaco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'factores_dosis_radiofarmaco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organo_critico', 'id_radiofarmaco', 'dosis_efectiva_0a2', 'dosis_efectiva_3a7', 'dosis_efectiva_8a12', 'dosis_efectiva_13a18', 'dosis_efectiva_hombre', 'dosis_efectiva_mujer', 'dosis_org_crit_0a2', 'dosis_org_crit_3a7', 'dosis_org_crit_8a12', 'dosis_org_crit_13a18', 'dosis_org_crit_hombre', 'dosis_org_crit_mujer'], 'required'],
            [['id_radiofarmaco'], 'integer'],
            [['dosis_efectiva_0a2', 'dosis_efectiva_3a7', 'dosis_efectiva_8a12', 'dosis_efectiva_13a18', 'dosis_efectiva_hombre', 'dosis_efectiva_mujer', 'dosis_org_crit_0a2', 'dosis_org_crit_3a7', 'dosis_org_crit_8a12', 'dosis_org_crit_13a18', 'dosis_org_crit_hombre', 'dosis_org_crit_mujer'], 'number'],
            [['organo_critico'], 'string', 'max' => 250]
        ];
    }
    


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organo_critico' => 'Organo Critico',
            'id_radiofarmaco' => 'Radiofarmaco',
            'dosis_efectiva_0a2' => 'Dosis Efectiva 0 a 2 years',
            'dosis_efectiva_3a7' => 'Dosis Efectiva 3 a 7 years',
            'dosis_efectiva_8a12' => 'Dosis Efectiva 8 a 12 years',
            'dosis_efectiva_13a18' => 'Dosis Efectiva 13 a 18 years',
            'dosis_efectiva_hombre' => 'Dosis Efectiva Hombre',
            'dosis_efectiva_mujer' => 'Dosis Efectiva Mujer',
            'dosis_org_crit_0a2' => 'Dosis Org Crit 0 a 2 years',
            'dosis_org_crit_3a7' => 'Dosis Org Crit 3 a 7 years',
            'dosis_org_crit_8a12' => 'Dosis Org Crit 8 a 12 years',
            'dosis_org_crit_13a18' => 'Dosis Org Crit 13 a 18 years',
            'dosis_org_crit_hombre' => 'Dosis Org Crit Hombre',
            'dosis_org_crit_mujer' => 'Dosis Org Crit Mujer',
        ];
    }
}
