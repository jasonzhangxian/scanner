<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OauthTaobao */

$this->title = 'Create Oauth Taobao';
$this->params['breadcrumbs'][] = ['label' => 'Oauth Taobaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oauth-taobao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
