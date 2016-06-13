<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cid',
            'seller_cids',
            'props:ntext',
            'pic_url:url',
            // 'num',
            // 'list_time',
            // 'delist_time',
            // 'has_discount',
            // 'has_invoice',
            // 'has_warranty',
            // 'has_showcase',
            // 'modified',
            // 'approve_status',
            // 'postage_id',
            // 'is_virtual',
            // 'is_taobao',
            // 'is_ex',
            // 'is_darwin',
            // 'num_iid',
            // 'title',
            // 'nick',
            // 'type',
            // 'valid_thru',
            // 'outer_id',
            // 'is_cspu',
            // 'sold_quantity',
            // 'price',
            // 'iid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
