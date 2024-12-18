<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangModels */

$this->title = 'Update Barang Models: ' . $model->kode_barang;
$this->params['breadcrumbs'][] = ['label' => 'Barang Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_barang, 'url' => ['view', 'id' => $model->kode_barang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-models-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
