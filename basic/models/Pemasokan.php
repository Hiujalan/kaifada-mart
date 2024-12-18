<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemasokan".
 *
 * @property int $id_pemasokan
 * @property int|null $id_pemasok
 * @property string|null $tanggal_pemasokan
 * @property float|null $jumlah_bayar
 *
 * @property DetailPemasokan[] $detailPemasokans
 * @property Pemasok $pemasok
 */
class Pemasokan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemasokan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemasokan'], 'required'],
            [['id_pemasokan', 'id_pemasok'], 'integer'],
            [['tanggal_pemasokan'], 'safe'],
            [['jumlah_bayar'], 'number'],
            [['id_pemasokan'], 'unique'],
            [['id_pemasok'], 'exist', 'skipOnError' => true, 'targetClass' => Pemasok::className(), 'targetAttribute' => ['id_pemasok' => 'id_pemasok']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemasokan' => 'Id Pemasokan',
            'id_pemasok' => 'Id Pemasok',
            'tanggal_pemasokan' => 'Tanggal Pemasokan',
            'jumlah_bayar' => 'Jumlah Bayar',
        ];
    }

    /**
     * Gets query for [[DetailPemasokans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPemasokans()
    {
        return $this->hasMany(DetailPemasokan::className(), ['id_pemasokan' => 'id_pemasokan']);
    }

    /**
     * Gets query for [[Pemasok]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemasok()
    {
        return $this->hasOne(Pemasok::className(), ['id_pemasok' => 'id_pemasok']);
    }
}
