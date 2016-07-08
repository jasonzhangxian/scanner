<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keywords */

$this->title = 'Update Keywords: ' . ' ' . $model->wid;
$this->params['breadcrumbs'][] = ['label' => 'Keywords', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wid, 'url' => ['view', 'id' => $model->wid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keywords-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
