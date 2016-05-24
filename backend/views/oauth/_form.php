<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OauthTaobao */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oauth-taobao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appkey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expires_in')->textInput() ?>

    <?= $form->field($model, 'refresh_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 're_expires_in')->textInput() ?>

    <?= $form->field($model, 'r1_expires_in')->textInput() ?>

    <?= $form->field($model, 'r2_expires_in')->textInput() ?>

    <?= $form->field($model, 'w1_expires_in')->textInput() ?>

    <?= $form->field($model, 'w2_expires_in')->textInput() ?>

    <?= $form->field($model, 'taobao_user_nick')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taobao_user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_taobao_user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_taobao_user_nick')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
