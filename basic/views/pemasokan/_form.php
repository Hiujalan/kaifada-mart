<?php

use app\models\Barang;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pemasokan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemasokan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemasokan')->textInput() ?>

    <?= $form->field($model, 'id_pemasok')->dropDownList(
        $dt_pemasok,
        ['prompt' => 'Pilih Pemasok']
    ) ?>

    <?= $form->field($detailModel, 'kode_barang')->dropDownList(
        ArrayHelper::map(Barang::find()->all(), 'kode_barang', 'nama_barang'),
        ['prompt' => 'Pilih Barang']
    ) ?>

    <?= $form->field($detailModel, 'jumlah_barang')->textInput() ?>

    <?= $form->field($detailModel, 'h_beli_barang')->textInput() ?>

    <?= $form->field($model, 'tanggal_pemasokan')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'jumlah_bayar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>