<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemasok;

/**
 * PemasokSearch represents the model behind the search form of `app\models\Pemasok`.
 */
class PemasokSearch extends Pemasok
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemasok', 'telp_pemasok'], 'integer'],
            [['nama_pemasok', 'alamat_pemasok'], 'safe'],
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
        $query = Pemasok::find();

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
            'id_pemasok' => $this->id_pemasok,
            'telp_pemasok' => $this->telp_pemasok,
        ]);

        $query->andFilterWhere(['like', 'nama_pemasok', $this->nama_pemasok])
            ->andFilterWhere(['like', 'alamat_pemasok', $this->alamat_pemasok]);

        return $dataProvider;
    }
}
