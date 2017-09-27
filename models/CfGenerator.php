<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cf_generator".
 *
 * @property integer $id
 * @property string $name
 * @property integer $number
 * @property string $batch
 * @property string $indice_transpte_recepcion
 * @property string $company
 * @property string $reception_datetime
 * @property string $waste_datetime
 * @property string $factory_datetime_reference
 * @property double $factory_activity_reference
 * @property string $factory_production_datetime
 * @property string $factory_expiracion_datetime
 * @property string $first_datetime_elucion
 * @property double $first_activity_elucion
 * @property string $last_datetime_elucion
 * @property double $last_activity_elucion
 * @property string $specialist
 * @property integer $status
 * @property string $observation
 * @property string $datetime_r
 * @property string $username
 * @property string $dosis1m_recepcion
 * @property string $dosis1m_desecho
 * @property double $frotis_recepcion
 *
 * @property CfPrepareDoses[] $cfPrepareDoses
 */
class CfGenerator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cf_generator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'batch', 'reception_datetime', 'specialist', 'status', 'datetime_r', 'username',
                'dosis1m_recepcion', 'dosis1m_desecho', 'frotis_recepcion'], 'required'],
            [['number', 'status'], 'integer'],
            [['reception_datetime', 'waste_datetime', 'factory_datetime_reference', 'factory_production_datetime',
                'factory_expiracion_datetime', 'first_datetime_elucion', 'last_datetime_elucion', 'datetime_r'], 'safe'],
            [['factory_activity_reference', 'first_activity_elucion', 'last_activity_elucion', 'frotis_recepcion'], 'number'],
            [['observation'], 'string'],
            [['name', 'indice_transpte_recepcion'], 'string', 'max' => 100],
            [['batch'], 'string', 'max' => 50],
            [['company'], 'string', 'max' => 200],
            [['specialist', 'username'], 'string', 'max' => 255],
            [['dosis1m_recepcion', 'dosis1m_desecho'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'indice_transpte_recepcion' => 'Indice Transporte Recepcion',
            'company' => html_entity_decode('Compannia Productora'),
            'name' => 'Nombre Comercial',
            'number' => 'Codigo',
            'batch' => 'Lote',
            'reception_datetime' => 'Fecha de recepcion',
            'waste_datetime' => 'Fecha de Desecho',
            'factory_datetime_reference' => 'Referencia de fecha de fabrica',
            'factory_activity_reference' => 'Actividad de Referencia(GBq)',
            'factory_production_datetime' => 'Fecha de produccion de fabrica',
            'factory_expiracion_datetime' => 'Fecha de caducidad de fabrica',
            'first_datetime_elucion' => 'Primera fecha de Elucion',
            'first_activity_elucion' => 'Primera actividad de Elucion',
            'last_datetime_elucion' => 'Ultima fecha de Elucion del Productor',
            'last_activity_elucion' => 'Ultima actividad de Elucion',
            'specialist' => 'Especialista que recibe',
            'status' => 'Estado',
            'observation' => 'Observacion',
            'datetime_r' => 'Fecha R',
            'username' => 'Nombre de usuario',
            'dosis1m_recepcion' => 'Dosis a 1 m del bulto (mSv) Recepcion',
            'dosis1m_desecho' => 'Dosis a 1 m del bulto (mSv) Desecho',
            'frotis_recepcion' => 'Frotis en recepcion (negativo_positivo)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCfPrepareDoses()
    {
        return $this->hasMany(CfPrepareDoses::className(), ['cf_generator_id' => 'id']);
    }

    public function getEspecialista()
    {
        return $this->hasOne(CfWorker::className(), ['id' => 'specialist']);
    }
}
