<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_nombre_medicos".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $email
 *
 * @property CfMedicalConsultation[] $cfMedicalConsultations
 */
class CfNombreMedicos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_nombre_medicos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'email'], 'required'],
            [['nombre'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 200],
            [['nombre'], 'unique']
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              nombre LIKE              email LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'email' => 'Email',
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
            'nombre' => 'Nombre',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfMedicalConsultations()
    {
        return $this->hasMany(CfMedicalConsultation::className(), ['medico_id' => 'id']);
    }
}
