<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pemasokan */

$this->title = $model->id_pemasokan;
$this->params['breadcrumbs'][] = ['label' => 'Pemasokans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pemasokan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pemasokan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pemasokan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pemasokan',
            [
                'attribute' => 'nama_barang',
                'value' => function ($model) {
                    foreach ($model->detailPemasokans as $detail) {
                        $barangNames = $detail->kodeBarang->nama_barang;
                    }
                    return $barangNames;
                },
                'label' => 'Nama Barang',
            ],
            [
                'attribute' => 'jumlah_barang',
                'value' => $model->detailPemasokans ? array_sum(array_column($model->detailPemasokans, 'jumlah_barang')) : 'Tidak ada detail',
                'label' => 'Jumlah Barang',
            ],
            'id_pemasok',
            'tanggal_pemasokan',
            'jumlah_bayar',
        ],
    ]) ?>

</div>