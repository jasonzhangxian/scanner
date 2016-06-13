<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cid')->textInput() ?>

    <?= $form->field($model, 'seller_cids')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'props')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pic_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num')->textInput() ?>

    <?= $form->field($model, 'list_time')->textInput() ?>

    <?= $form->field($model, 'delist_time')->textInput() ?>

    <?= $form->field($model, 'has_discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_invoice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_warranty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_showcase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified')->textInput() ?>

    <?= $form->field($model, 'approve_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postage_id')->textInput() ?>

    <?= $form->field($model, 'is_virtual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_taobao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_ex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_darwin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_iid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nick')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valid_thru')->textInput() ?>

    <?= $form->field($model, 'outer_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_cspu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sold_quantity')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
