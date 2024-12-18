<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $kode_barang
 * @property string|null $nama_barang
 * @property int|null $stok_barang
 * @property float|null $h_jual_barang
 *
 * @property DetailPemasokan[] $detailPemasokans
 * @property DetailPenjualan[] $detailPenjualans
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_barang'], 'required'],
            [['kode_barang', 'stok_barang'], 'integer'],
            [['h_jual_barang'], 'number'],
            [['nama_barang'], 'string', 'max' => 225],
            [['kode_barang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'stok_barang' => 'Stok Barang',
            'h_jual_barang' => 'H Jual Barang',
        ];
    }

    /**
     * Gets query for [[DetailPemasokans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPemasokans()
    {
        return $this->hasMany(DetailPemasokan::className(), ['kode_barang' => 'kode_barang']);
    }

    /**
     * Gets query for [[DetailPenjualans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::className(), ['kode_barang' => 'kode_barang']);
    }

    public function getCountData()
    {
        return $this->getDb()->queryBuilder('SELECT * FROM barang')->getNumRow();
    }

    public function getStok()
    {
        return $this->stok_barang;
    }
}
