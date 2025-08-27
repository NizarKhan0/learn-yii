<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Staff $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="staff-form">
    <div class="x_panel">
        <div class="x_title">

            <h2>Staff Information</h2>

            <div class="clearfix"></div>

        </div>
        <div class="x_content">
            <br>
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'id_personal')->widget(Select2::class, [
                        'data' => $personalName,
                        'options' => ['placeholder' => 'Select a name'],
                        'theme' => Select2::THEME_BOOTSTRAP,
                        'pluginOptions' => [
                            'allowClear' => true,
                            // 'hideSearch' => true,
                            // 'multiple' => false
                        ],
                    ])->label('Full Name'); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'staff_category')->widget(Select2::class, [
                        'data' => $staffCategoryList,
                        'options' => ['placeholder' => 'Select'],
                        'pluginOptions' => [
                            'allowClear' => true,
                            // 'hideSearch' => true,
                            // 'multiple' => false
                        ],
                    ]); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'staff_status')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'start_date')->widget(
                        DatePicker::class,
                        [
                            'options' => ['placeholder' => 'Choose start date'],
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true,
                            ]
                        ]
                    ) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'salary')->textInput(['type' => 'number']) ?>
                </div>
            </div>

            <div class="ln_solid"></div>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>