<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_settings".
 *
 * @property integer $id
 * @property string $parameter
 * @property string $value
 * @property string $description
 */
class CfSettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parameter'], 'required'],
            [['value', 'description'], 'string'],
            [['parameter'], 'string', 'max' => 100]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              parameter LIKE              value LIKE              description LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'parameter' => 'Parameter',
            'value' => 'Value',
            'description' => 'Description',
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
            'parameter' => 'Parameter',
            'value' => 'Value',
            'description' => 'Description',
        ];
    }
}
