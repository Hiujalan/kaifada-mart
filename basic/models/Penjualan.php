<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property int $id_penjualan
 * @property int|null $id_karyawan
 * @property string|null $tanggal_penjualan
 * @property float|null $total_bayar
 *
 * @property DetailPenjualan[] $detailPenjualans
 * @property Karyawan $karyawan
 */
class Penjualan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penjualan'], 'required'],
            [['id_penjualan', 'id_karyawan'], 'integer'],
            [['tanggal_penjualan'], 'safe'],
            [['total_bayar'], 'number'],
            [['id_penjualan'], 'unique'],
            [['id_karyawan'], 'exist', 'skipOnError' => true, 'targetClass' => Karyawan::className(), 'targetAttribute' => ['id_karyawan' => 'id_karyawan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penjualan' => 'Id Penjualan',
            'id_karyawan' => 'Id Karyawan',
            'tanggal_penjualan' => 'Tanggal Penjualan',
            'total_bayar' => 'Total Bayar',
        ];
    }

    /**
     * Gets query for [[DetailPenjualans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::className(), ['id_penjualan' => 'id_penjualan']);
    }

    /**
     * Gets query for [[Karyawan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKaryawan()
    {
        return $this->hasOne(Karyawan::className(), ['id_karyawan' => 'id_karyawan']);
    }
}
