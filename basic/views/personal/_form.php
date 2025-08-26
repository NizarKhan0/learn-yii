<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<!-- Option 1 custom inline css yii2 -->
<!-- <style>
label {
    margin-right: 30px;
}
</style> -->

<div class="x_panel">
    <div class="x_title">

        <h2>Personal Identity</h2>

        <div class="clearfix"></div>

    </div>
    <div class="x_content">
        <br>
        <?php $form = ActiveForm::begin(); ?>

        <!-- total row in column max 12 -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-2 col-xs-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-3 col-xs-7">
                <!-- <label>Gender:</label>
                <p>
                    Male:
                    <input type="radio" class="flat" name="Personal[gender]" id="genderM" value="Male" checked="" required /> 
                    Female:
                    <input type="radio" class="flat" name="Personal[gender]" id="genderF" value="Female" />
                </p> -->
                <?= $form->field($model, 'gender',)->radioList(['Male' => 'Male', 'Female' => 'Female'], [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        //untuk debug
                        // echo $value;
                        // die();

                        //Option 2 custom inline css yii2
                        return '<input type="radio" class="flat" name="' . $name . '" id="' . $name . $index . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . ' required />' .
                            '<label style = "margin-right: 30px" for="' . $name . $index . '">' . ucwords($label) . '</label>';
                    }
                ]) ?>
            </div>

            <div class="col-md-3 col-xs-5">
                <?= $form->field($model, 'birth_location')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <!-- total row in column max 12 -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <!-- <?= $form->field($model, 'birth_date')->textInput() ?> -->
                <!-- Usage with model and Active Form (with no default initial value) -->
                <?= $form->field($model, 'birth_date')->widget(DatePicker::class, [
                    'options' => ['placeholder' => 'Choose birth date'], // or 'php:Y-m-d'
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd', // or 'php:Y-m-d'
                        'autoclose' => true,
                        'todayHighlight' => true,
                    ],
                ]); ?>
            </div>

            <div class="col-md-2 col-xs-6">
                <?= $form->field($model, 'martial_status')->widget(Select2::class, [
                    'data' => ['Single' => 'Single', 'Married' => 'Married', 'Divorced' => 'Divorced', 'Widowed' => 'Widowed'],
                    'options' => ['placeholder' => 'Select a martial status....'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        // 'hideSearch' => true,
                        // 'multiple' => false
                    ],
                ]); ?>
            </div>

            <div class="col-md-3 col-xs-6">
                <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-3 col-xs-6">
                <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <!-- total row in column max 12 -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>
            </div>

            <div class="col-md-2 col-xs-6 ">
                <?= $form->field($model, 'no_ic')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-3 col-xs-6">
                <?= $form->field($model, 'no_phone')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-3 col-xs-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <!-- <div class="">
            <label>
                <input type="checkbox" class="js-switch" checked /> Checked
            </label>
        </div> -->

        <div class="ln_solid"></div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>