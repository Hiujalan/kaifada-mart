<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailPenjualanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-penjualan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'no') ?>

    <?= $form->field($model, 'id_penjualan') ?>

    <?= $form->field($model, 'kode_barang') ?>

    <?= $form->field($model, 'jumlah_barang') ?>

    <?= $form->field($model, 'h_jual_barang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
