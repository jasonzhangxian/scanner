<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keywords';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keywords-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Keywords', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'wid',
            'type',
            'word',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
