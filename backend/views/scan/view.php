<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Keywords */

$this->title = $model->wid;
$this->params['breadcrumbs'][] = ['label' => 'Keywords', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keywords-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->wid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->wid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'wid',
            'type',
            'word',
        ],
    ]) ?>

</div>
