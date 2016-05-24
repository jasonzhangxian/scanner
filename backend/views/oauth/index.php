<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Oauth Taobaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oauth-taobao-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Oauth Taobao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'appkey',
            'access_token',
            'token_type',
            'expires_in',
            // 'refresh_token',
            // 're_expires_in',
            // 'r1_expires_in',
            // 'r2_expires_in',
            // 'w1_expires_in',
            // 'w2_expires_in',
            // 'taobao_user_nick',
            // 'taobao_user_id',
            // 'sub_taobao_user_id',
            // 'sub_taobao_user_nick',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
