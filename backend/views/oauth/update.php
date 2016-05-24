<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OauthTaobao */

$this->title = 'Update Oauth Taobao: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Oauth Taobaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oauth-taobao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
