<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailPemasokan */

$this->title = 'Create Detail Pemasokan';
$this->params['breadcrumbs'][] = ['label' => 'Detail Pemasokans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-pemasokan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
