<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailPemasokan */

$this->title = 'Update Detail Pemasokan: ' . $model->no;
$this->params['breadcrumbs'][] = ['label' => 'Detail Pemasokans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no, 'url' => ['view', 'id' => $model->no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-pemasokan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
