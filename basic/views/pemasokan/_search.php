<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PemasokanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pemasokan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_pemasokan') ?>

    <?= $form->field($model, 'id_pemasok') ?>

    <?= $form->field($model, 'tanggal_pemasokan') ?>

    <?= $form->field($model, 'jumlah_bayar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
