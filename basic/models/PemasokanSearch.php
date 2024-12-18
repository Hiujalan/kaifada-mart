<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemasokan;

/**
 * PemasokanSearch represents the model behind the search form of `app\models\Pemasokan`.
 */
class PemasokanSearch extends Pemasokan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemasokan', 'id_pemasok'], 'integer'],
            [['tanggal_pemasokan'], 'safe'],
            [['jumlah_bayar'], 'number'],
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
    public function search($params)
    {
        $query = Pemasokan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pemasokan' => $this->id_pemasokan,
            'id_pemasok' => $this->id_pemasok,
            'tanggal_pemasokan' => $this->tanggal_pemasokan,
            'jumlah_bayar' => $this->jumlah_bayar,
        ]);

        return $dataProvider;
    }
}
