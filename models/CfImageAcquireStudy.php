<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_image_acquire_study".
 *
 * @property integer $id
 * @property string $img_name_path
 * @property string $img_size
 * @property string $img_type
 * @property string $meta_tag
 * @property integer $process_status
 * @property integer $cf_medical_consultation_id
 *
 * @property CfAcquireImage $id0
 */
class CfImageAcquireStudy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_image_acquire_study';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img_name_path', 'img_size', 'img_type', 'meta_tag', 'process_status', 'cf_medical_consultation_id'], 'required'],
            [['process_status', 'id_tbcf_acquire_image'], 'integer'],
            [['img_name_path', 'meta_tag'], 'string', 'max' => 250],
            [['img_size'], 'string', 'max' => 150],
            [['img_type'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img_name_path' => 'Img Name Path',
            'img_size' => 'Img Size',
            'img_type' => 'Img Type',
            'meta_tag' => 'Meta Tag',
            'process_status' => 'Process Status',
            'cf_medical_consultation_id' => 'Id Consulta Medica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(CfAcquireImage::className(), ['id' => 'id']);
    }
}
