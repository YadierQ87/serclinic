<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfEquipment;

/**
 * CfEquipmentSearch represents the model behind the search form about `app\models\CfEquipment`.
 */
class CfEquipmentSearch extends CfEquipment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_local_id', 'cf_types_equipment_id', 'status'], 'integer'],
            [['name', 'stock_number', 'mark', 'model', 'specialist', 'production_datetime', 'last_calibration_datetime', 'last_calibration_certified', 'observation', 'can_users', 'datetime_r', 'username'], 'safe'],
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
        $query = CfEquipment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cf_local_id' => $this->cf_local_id,
            'cf_types_equipment_id' => $this->cf_types_equipment_id,
            'production_datetime' => $this->production_datetime,
            'last_calibration_datetime' => $this->last_calibration_datetime,
            'status' => $this->status,
            'datetime_r' => $this->datetime_r,
        ]);*/

        $query->orFilterWhere(['like', 'name', $params])
            ->orFilterWhere(['like', 'stock_number', $params])
            ->orFilterWhere(['like', 'mark',$params])
            ->orFilterWhere(['like', 'model',$params])
            ->orFilterWhere(['like', 'specialist', $params])
            ->orFilterWhere(['like', 'last_calibration_certified', $params])
            ->orFilterWhere(['like', 'observation',$params])
            ->orFilterWhere(['like', 'can_users', $params])
            ->orFilterWhere(['like', 'username',$params]);

        return $dataProvider;
    }
}
