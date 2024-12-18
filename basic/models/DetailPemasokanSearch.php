<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailPemasokan;

/**
 * DetailPemasokanSearch represents the model behind the search form of `app\models\DetailPemasokan`.
 */
class DetailPemasokanSearch extends DetailPemasokan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no', 'kode_barang', 'jumlah_barang', 'id_pemasokan'], 'integer'],
            [['h_beli_barang'], 'number'],
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
        $query = DetailPemasokan::find();

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
            'no' => $this->no,
            'kode_barang' => $this->kode_barang,
            'jumlah_barang' => $this->jumlah_barang,
            'id_pemasokan' => $this->id_pemasokan,
            'h_beli_barang' => $this->h_beli_barang,
        ]);

        return $dataProvider;
    }
}
