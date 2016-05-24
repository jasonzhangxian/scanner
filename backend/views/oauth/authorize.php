<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OauthTaobao */

$this->title = isset($title) ? $title : '应用授权';

?>
<div class="oauth-taobao-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <? if(isset($error_description)) { ?>
		<h4><?= Html::encode($error_description) ?></h4>
	<? } ?>
    <? if(isset($link)) { ?>
		<a href='<?= $link ?>'><?= Html::encode($text) ?></a>
	<? } ?>
</div>
