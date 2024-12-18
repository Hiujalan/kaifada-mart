<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Barang';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row row-card-no-pd">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <h4 class="card-title"><?= Html::encode($this->title) ?></h4>
                    <div class="card-tools">
                        <p>
                            <?= Html::a('Tambah Data', ['create'], ['class' => 'btn btn-success']) ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <?php Pjax::begin(); ?>
                        <?php
                        // echo $this->render('_search', ['model' => $searchModel]); 
                        ?>

                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok Barang</th>
                                        <th>Harga Jual</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dt_barang as $row): ?>
                                        <tr>
                                            <td><?= Html::encode($row['kode_barang']) ?></td>
                                            <td><?= Html::encode($row['nama_barang']) ?></td>
                                            <td><?= Html::encode($row['stok_barang']) ?></td>
                                            <td><?= Yii::$app->formatter->asCurrency($row['h_jual_barang'], 'IDR') ?></td>
                                            <td>
                                                <?= Html::a('View', ['view', 'id' => $row['kode_barang']], ['class' => 'btn btn-primary btn-sm']) ?>
                                                <?= Html::a('Update', ['update', 'id' => $row['kode_barang']], ['class' => 'btn btn-warning btn-sm']) ?>
                                                <?= Html::a('Delete', ['delete', 'id' => $row['kode_barang']], [
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'data' => [
                                                        'confirm' => 'Are you sure you want to delete this item?',
                                                        'method' => 'post',
                                                    ],
                                                ]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php Pjax::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>