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
                <?= $form->field($model, 'gender', )->radioList(['Male' => 'Male', 'Female' => 'Female'], [
                    'item' => function ($index, $label, $name, $checked, $value) {
                        //untuk debug
                        // echo $value;
                        // die();

                        return '<input type="radio" class="flat" name="' . $name . '" id="' . $name . $index . '" value="' . $value . '" ' . ($checked ? 'checked' : '') . ' required />' .
                            '<label for="' . $name . $index . '">' . ucwords($label) . '</label>';
                    }
                ])?>
            </div>

            <div class="col-md-3 col-xs-5">
                <?= $form->field($model, 'birth_location')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <!-- total row in column max 12 -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <?= $form->field($model, 'birth_date')->textInput() ?>
            </div>

            <div class="col-md-2 col-xs-6">
                <?= $form->field($model, 'martial_status')->textInput(['maxlength' => true]) ?>
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