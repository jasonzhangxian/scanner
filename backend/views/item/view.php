<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'cid',
            'seller_cids',
            'props:ntext',
            'pic_url:url',
            'num',
            'list_time',
            'delist_time',
            'has_discount',
            'has_invoice',
            'has_warranty',
            'has_showcase',
            'modified',
            'approve_status',
            'postage_id',
            'is_virtual',
            'is_taobao',
            'is_ex',
            'is_darwin',
            'num_iid',
            'title',
            'nick',
            'type',
            'valid_thru',
            'outer_id',
            'is_cspu',
            'sold_quantity',
            'price',
            'iid',
        ],
    ]) ?>

</div>
