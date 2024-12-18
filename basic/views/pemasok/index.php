<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PemasokSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemasok';
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
                                        <th>ID Pemasok</th>
                                        <th>Nama Pemasok</th>
                                        <th>Alamat Pemasok</th>
                                        <th>Nomor Telephone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dt_pemasok as $row): ?>
                                        <tr>
                                            <td><?= Html::encode($row['id_pemasok']) ?></td>
                                            <td><?= Html::encode($row['nama_pemasok']) ?></td>
                                            <td><?= Html::encode($row['alamat_pemasok']) ?></td>
                                            <td><?= Html::encode($row['telp_pemasok']) ?></td>
                                            <td>
                                                <?= Html::a('View', ['view', 'id' => $row['id_pemasok']], ['class' => 'btn btn-primary btn-sm']) ?>
                                                <?= Html::a('Update', ['update', 'id' => $row['id_pemasok']], ['class' => 'btn btn-warning btn-sm']) ?>
                                                <?= Html::a('Delete', ['delete', 'id' => $row['id_pemasok']], [
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
