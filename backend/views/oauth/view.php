<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OauthTaobao */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oauth Taobaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oauth-taobao-view">

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
            'appkey',
            'access_token',
            'token_type',
            'expires_in',
            'refresh_token',
            're_expires_in',
            'r1_expires_in',
            'r2_expires_in',
            'w1_expires_in',
            'w2_expires_in',
            'taobao_user_nick',
            'taobao_user_id',
            'sub_taobao_user_id',
            'sub_taobao_user_nick',
        ],
    ]) ?>

</div>
