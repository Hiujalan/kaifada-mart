<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemasok".
 *
 * @property int $id_pemasok
 * @property string|null $nama_pemasok
 * @property string|null $alamat_pemasok
 * @property int|null $telp_pemasok
 *
 * @property Pemasokan[] $pemasokans
 */
class Pemasok extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemasok';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pemasok'], 'required'],
            [['id_pemasok', 'telp_pemasok'], 'integer'],
            [['nama_pemasok', 'alamat_pemasok'], 'string', 'max' => 225],
            [['id_pemasok'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pemasok' => 'Id Pemasok',
            'nama_pemasok' => 'Nama Pemasok',
            'alamat_pemasok' => 'Alamat Pemasok',
            'telp_pemasok' => 'Telp Pemasok',
        ];
    }

    /**
     * Gets query for [[Pemasokans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemasokans()
    {
        return $this->hasMany(Pemasokan::className(), ['id_pemasok' => 'id_pemasok']);
    }
}
