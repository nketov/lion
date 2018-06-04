<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Excel;

/**
 * ExcelSearch represents the model behind the search form of `common\models\Excel`.
 */
class ExcelSearch extends Excel
{

    public $method = 0;

    /**
     * {@inheritdoc}
     *   *
     */


    public function rules()
    {
        return [
            [['id', 'quantity'], 'integer'],
            [['code', 'name', 'analogs', 'cars', 'fabricator', 'currency', 'note', 'store', 'method'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params, $method = 0)
    {
        $query = Excel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->defaultOrder['name'] = SORT_ASC;


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ]);

        if ($method) {
            $query->andFilterWhere(['or',
                    ['like', 'name', $this->code],
                    ['like', 'code', $this->code],
                    ['like', 'analogs', $this->code]]
            )
                ->andFilterWhere(['like', 'cars', $this->cars]);
        } else {
            $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'analogs', $this->analogs])
                ->andFilterWhere(['like', 'cars', $this->cars])
                ->andFilterWhere(['like', 'fabricator', $this->fabricator])
                ->andFilterWhere(['like', 'currency', $this->currency])
                ->andFilterWhere(['like', 'note', $this->note])
                ->andFilterWhere(['like', 'store', $this->store]);
        }
        return $dataProvider;
    }


}
