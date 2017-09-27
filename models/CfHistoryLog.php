<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_history_log".
 *
 * @property integer $id
 * @property string $entity
 * @property string $section
 * @property string $level
 * @property string $username
 * @property integer $user_id
 * @property string $user_ip_source
 * @property string $action
 * @property string $field_name
 * @property string $old_value
 * @property string $new_value
 * @property string $datetime
 * @property string $msg
 */
class CfHistoryLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_history_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'user_id', 'user_ip_source', 'datetime'], 'required'],
            [['user_id'], 'integer'],
            [['old_value', 'new_value', 'msg'], 'string'],
            [['datetime'], 'safe'],
            [['entity', 'section', 'level', 'username', 'action', 'field_name'], 'string', 'max' => 100],
            [['user_ip_source'], 'string', 'max' => 255]
        ];
    }
    

    /* echos por Michi Ing. (Yadier A.)
    public function get_filtros_str()
    {
       return [
             id LIKE              entity LIKE              section LIKE              level LIKE              username LIKE              user_id LIKE              user_ip_source LIKE              action LIKE              field_name LIKE              old_value LIKE              new_value LIKE              datetime LIKE              msg LIKE         ];
    }


    public function get_filtros_int()
    {
       return [
            'id' => 'ID',
            'entity' => 'Entity',
            'section' => 'Section',
            'level' => 'Level',
            'username' => 'Username',
            'user_id' => 'User ID',
            'user_ip_source' => 'User Ip Source',
            'action' => 'Action',
            'field_name' => 'Field Name',
            'old_value' => 'Old Value',
            'new_value' => 'New Value',
            'datetime' => 'Datetime',
            'msg' => 'Msg',
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
            'entity' => 'Entidad',
            'section' => 'Seccion',
            'level' => 'Nivel',
            'username' => 'Nombre de usuario',
            'user_id' => 'Usuario ID',
            'user_ip_source' => 'Direccion IP del usuario',
            'action' => 'Accion',
            'field_name' => 'Nombre de campo',
            'old_value' => 'Ultimo valor',
            'new_value' => 'Nuevo valor',
            'datetime' => 'Fecha',
            'msg' => 'Mensaje',
        ];
    }
}
