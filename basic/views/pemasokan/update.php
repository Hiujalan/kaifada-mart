<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pemasokan */

$this->title = 'Update Pemasokan: ' . $model->id_pemasokan;
$this->params['breadcrumbs'][] = ['label' => 'Pemasokans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pemasokan, 'url' => ['view', 'id' => $model->id_pemasokan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemasokan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'detailModel' => $detailModel,
        'dt_pemasok' => $dt_pemasok,
    ]) ?>

</div>
