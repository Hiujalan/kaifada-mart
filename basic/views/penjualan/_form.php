<?php

use app\models\Barang;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_penjualan')->textInput() ?>

    <?= $form->field($model, 'id_karyawan')->dropDownList(
        $dt_karyawan,
        ['prompt' => 'Pilih Karyawan']
    ) ?>

    <?= $form->field($detailModel, 'kode_barang')->dropDownList(
        ArrayHelper::map(Barang::find()->all(), 'kode_barang', 'nama_barang'),
        ['prompt' => 'Pilih Barang']
    ) ?>

    <?= $form->field($detailModel, 'jumlah_barang')->textInput() ?>

    <?= $form->field($detailModel, 'h_jual_barang')->textInput() ?>

    <?= $form->field($model, 'tanggal_penjualan')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'total_bayar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>