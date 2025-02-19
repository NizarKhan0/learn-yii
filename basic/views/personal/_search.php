<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PersonalSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="personal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_personal') ?>

    <?= $form->field($model, 'full_name') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'birth_location') ?>

    <?php // echo $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'martial_status') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'no_ic') ?>

    <?php // echo $form->field($model, 'no_phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
