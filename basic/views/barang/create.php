<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangModels */

$this->title = 'Create Barang Models';
$this->params['breadcrumbs'][] = ['label' => 'Barang Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-models-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
