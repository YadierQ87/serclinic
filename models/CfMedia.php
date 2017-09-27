<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_media".
 *
 * @property integer $id
 * @property string $name
 * @property string $file_name
 * @property string $mime_type
 * @property integer $size
 * @property string $path
 * @property string $meta
 * @property integer $status
 * @property string $observation
 *
 * @property CfPatient[] $cfPatients
 */
class CfMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size', 'status'], 'integer'],
            [['status'], 'required'],
            [['observation'], 'string'],
            [['name', 'file_name'], 'string', 'max' => 200],
            [['mime_type'], 'string', 'max' => 100],
            [['path', 'meta'], 'string', 'max' => 255]
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'file_name' => 'Nombre de archivo',
            'mime_type' => 'Tipo MIME',
            'size' => 'Tamaño',
            'path' => 'Camino',
            'meta' => 'Meta',
            'status' => 'Estado',
            'observation' => 'Observacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfPatients()
    {
        return $this->hasMany(CfPatient::className(), ['cf_media_id' => 'id']);
    }
}
