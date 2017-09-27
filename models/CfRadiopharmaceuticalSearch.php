<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfRadiopharmaceutical;

/**
 * CfRadiopharmaceuticalSearch represents the model behind the search form about `app\models\CfRadiopharmaceutical`.
 */
class CfRadiopharmaceuticalSearch extends CfRadiopharmaceutical
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cf_types_radiopharmaceutical_id', 'status', 'observation'], 'integer'],
            [['name', 'marcage_datetime', 'specialist'], 'safe'],
            [['marcage_activity', 'marcage_volumen'], 'number'],
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
        $query = CfRadiopharmaceutical::find();
        $query->joinWith('cfTypesRadiopharmaceutical');
        $query->joinWith('nombreRadiopharmaceutical');
        $query->joinWith('especialista');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }*/

        $dataProvider->sort->attributes['specialist'] = [
            'asc' => ['cf_worker.firstname' => SORT_ASC],
            'desc' => ['cf_worker.firstname' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['name'] = [
            'asc' => ['cf_nombre_radiofarmaco.nombre' => SORT_ASC],
            'desc' => ['cf_nombre_radiofarmaco.nombre' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['cf_types_radiopharmaceutical_id'] = [
            'asc' => ['cf_types_radiopharmaceutical.name' => SORT_ASC],
            'desc' => ['cf_types_radiopharmaceutical.name' => SORT_DESC],
        ];


//Nombre Liofilizado	Nombre RadioFármaco	Fecha Marcación	Actividad Marcación	Estado	Especialista
        $query->orFilterWhere(['like', 'marcage_datetime', $params])#ok
            ->orFilterWhere(['like', 'marcage_activity', $params])#ok
            ->orFilterWhere(['like', 'marcage_volumen', $params])
            ->orFilterWhere(['like', 'cf_types_radiopharmaceutical.name', $params])#ok
            ->orFilterWhere(['like', 'cf_nombre_radiofarmaco.nombre', $params])#ok
            //->orFilterWhere(['like', 'status', $params])
            ->orFilterWhere(['like', 'cf_worker.firstname', $params]);#ok


        return $dataProvider;
    }
}
