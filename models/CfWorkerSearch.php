<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CfWorker;

/**
 * CfWorkerSearch represents the model behind the search form about `app\models\CfWorker`.
 */
class CfWorkerSearch extends CfWorker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'fos_user_id', 'sex', 'status', 'user_id', 'is_toe'], 'integer'],
            [['firstname', 'lastname', 'personal_id', 'entity_id', 'photo', 'date_birth',
                'email', 'telephone', 'category', 'observation', 'nationality', 'town', 'region', 'datetime_r', 'username'], 'safe'],
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
        $query = CfWorker::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        /*if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }*/

       /* $query->andFilterWhere([
            'id' => $params,
            'fos_user_id' => $this->fos_user_id,
            'date_birth' => $this->date_birth,
            'sex' => $this->sex,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'is_toe' => $this->is_toe,
            'datetime_r' => $this->datetime_r,
        ]);*/

        $query->orFilterWhere(['like', 'firstname',$params])
            ->orFilterWhere(['like', 'lastname',$params])
            ->orFilterWhere(['like', 'personal_id', $params])
            ->orFilterWhere(['like', 'entity_id', $params])
            ->orFilterWhere(['like', 'photo', $params])
            ->orFilterWhere(['like', 'email', $params])
            ->orFilterWhere(['like', 'telephone', $params])
            ->orFilterWhere(['like', 'category',$params])
            ->orFilterWhere(['like', 'observation',$params])
            ->orFilterWhere(['like', 'nationality', $params])
            ->orFilterWhere(['like', 'town',$params])
            ->orFilterWhere(['like', 'region', $params])
            ->orFilterWhere(['like', 'username', $params]);

        return $dataProvider;
    }
}
