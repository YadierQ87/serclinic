<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfGenerator;

/**
 * CfGeneratorSearch represents the model behind the search form about `app\models\CfGenerator`.
 */
class CfGeneratorSearch extends CfGenerator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_local_id', 'number', 'status'], 'integer'],
            [['name', 'batch', 'mark', 'model', 'reception_datetime', 'waste_datetime', 'factory_datetime_reference', 'factory_production_datetime', 'factory_expiracion_datetime', 'first_datetime_elucion', 'last_datetime_elucion', 'specialist', 'observation', 'datetime_r', 'username'], 'safe'],
            [['factory_activity_reference', 'first_activity_elucion', 'last_activity_elucion'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CfGenerator::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->orFilterWhere(['like', 'name', $params])
            ->orFilterWhere(['like', 'batch', $params])
            ->orFilterWhere(['like', 'mark', $params])
            ->orFilterWhere(['like', 'model', $params])
            //->orFilterWhere(['like', 'model', $params])
            ->orFilterWhere(['like', 'specialist',$params])
            ->orFilterWhere(['like', 'observation', $params])
            ->orFilterWhere(['like', 'username', $params]);

        return $dataProvider;
    }
}
