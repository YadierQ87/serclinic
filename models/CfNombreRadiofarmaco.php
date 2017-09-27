<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_nombre_radiofarmaco".
 *
 * @property integer $id
 * @property string $nombre
 */
class CfNombreRadiofarmaco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_nombre_radiofarmaco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 200]
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => html_entity_decode("Nombre de Radiof&aacute;rmaco"),
        ];
    }
}
