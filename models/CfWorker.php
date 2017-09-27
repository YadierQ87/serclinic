<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_worker".
 *
 * @property integer $id
 * @property integer $fos_user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $personal_id
 * @property string $entity_id
 * @property string $photo
 * @property string $date_birth
 * @property integer $sex
 * @property integer $status
 * @property integer $user_id
 * @property string $email
 * @property string $telephone
 * @property integer $is_toe
 * @property string $category
 * @property string $observation
 * @property string $nationality
 * @property string $town
 * @property string $region
 * @property string $datetime_r
 * @property string $username
 *
 * @property FosUser $fosUser
 */
class CfWorker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_worker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fos_user_id', 'sex', 'status', 'user_id', 'is_toe'], 'integer'],
            [['firstname', 'lastname', 'sex', 'status', 'is_toe', 'datetime_r', 'username'], 'required'],
            [['date_birth', 'datetime_r'], 'safe'],
            [['observation', 'nationality', 'town', 'region'], 'string'],
            [['firstname', 'lastname', 'telephone'], 'string', 'max' => 100],
            [['personal_id', 'entity_id'], 'string', 'max' => 50],
            [['photo', 'email', 'category', 'username'], 'string', 'max' => 255]
        ];
    }
    



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fos_user_id' => 'Usuario',
            'firstname' => 'Nombre',
            'lastname' => 'Apellidos',
            'personal_id' => 'Personal ID',
            'entity_id' => 'Entity ID',
            'photo' => 'Photo',
            'date_birth' => 'Fecha Nacimiento',
            'sex' => 'Sexo',
            'status' => 'Estado',
            'user_id' => 'User ID',
            'email' => 'Email',
            'telephone' => 'Telefono',
            'is_toe' => 'Ocupacionalmente expuesto',
            'category' => 'Categoria',
            'observation' => 'Observacion',
            'nationality' => 'Nationalidad',
            'town' => 'Provincia',
            'region' => 'Municipio',
            'datetime_r' => 'Fecha Registro',
            'username' => 'Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'fos_user_id']);
    }

    public function getNombreCompleto()
    {
        return $this->firstname." ".$this->lastname;
    }
}
