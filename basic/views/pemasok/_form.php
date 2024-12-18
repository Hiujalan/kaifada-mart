<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pemasok */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemasok-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pemasok')->textInput() ?>

    <?= $form->field($model, 'nama_pemasok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_pemasok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telp_pemasok')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
