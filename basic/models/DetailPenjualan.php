<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_penjualan".
 *
 * @property int $no
 * @property int|null $id_penjualan
 * @property int|null $kode_barang
 * @property int|null $jumlah_barang
 * @property float|null $h_jual_barang
 *
 * @property Penjualan $penjualan
 * @property Barang $kodeBarang
 */
class DetailPenjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjualan', 'kode_barang', 'jumlah_barang'], 'integer'],
            [['h_jual_barang'], 'number'],
            [['id_penjualan'], 'exist', 'skipOnError' => true, 'targetClass' => Penjualan::className(), 'targetAttribute' => ['id_penjualan' => 'id_penjualan']],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no' => 'No',
            'id_penjualan' => 'Id Penjualan',
            'kode_barang' => 'Kode Barang',
            'jumlah_barang' => 'Jumlah Barang',
            'h_jual_barang' => 'H Jual Barang',
        ];
    }

    /**
     * Gets query for [[Penjualan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualan()
    {
        return $this->hasOne(Penjualan::className(), ['id_penjualan' => 'id_penjualan']);
    }

    /**
     * Gets query for [[KodeBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodeBarang()
    {
        return $this->hasOne(Barang::className(), ['kode_barang' => 'kode_barang']);
    }
}
