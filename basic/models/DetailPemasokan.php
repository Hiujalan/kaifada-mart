<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_pemasokan".
 *
 * @property int $no
 * @property int|null $kode_barang
 * @property int|null $jumlah_barang
 * @property int|null $id_pemasokan
 * @property float|null $h_beli_barang
 *
 * @property Barang $kodeBarang
 * @property Pemasokan $pemasokan
 */
class DetailPemasokan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_pemasokan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_barang', 'jumlah_barang', 'id_pemasokan'], 'integer'],
            [['h_beli_barang'], 'number'],
            [['kode_barang'], 'exist', 'skipOnError' => true, 'targetClass' => Barang::className(), 'targetAttribute' => ['kode_barang' => 'kode_barang']],
            [['id_pemasokan'], 'exist', 'skipOnError' => true, 'targetClass' => Pemasokan::className(), 'targetAttribute' => ['id_pemasokan' => 'id_pemasokan']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no' => 'No',
            'kode_barang' => 'Kode Barang',
            'jumlah_barang' => 'Jumlah Barang',
            'id_pemasokan' => 'Id Pemasokan',
            'h_beli_barang' => 'H Beli Barang',
        ];
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

    /**
     * Gets query for [[Pemasokan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemasokan()
    {
        return $this->hasOne(Pemasokan::className(), ['id_pemasokan' => 'id_pemasokan']);
    }
}
