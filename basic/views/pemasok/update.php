<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pemasok */

$this->title = 'Update Pemasok: ' . $model->id_pemasok;
$this->params['breadcrumbs'][] = ['label' => 'Pemasoks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pemasok, 'url' => ['view', 'id' => $model->id_pemasok]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemasok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
