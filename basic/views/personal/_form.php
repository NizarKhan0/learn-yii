<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="x_panel">
    <div class="x_title">

        <h2>Personal Identity</h2>

        <div class="clearfix"></div>

    </div>
    <div class="x_content">
        <br>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'birth_location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'birth_date')->textInput() ?>

        <?= $form->field($model, 'martial_status')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'no_ic')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'no_phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <div class="ln_solid"></div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="personal-form">




</div>