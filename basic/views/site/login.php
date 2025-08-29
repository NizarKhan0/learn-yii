<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap\ActiveForm $form */
/** @var app\models\LoginForm $model */
/** @var app\models\SignupForm $model */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <!-- hidden anchors (penting untuk switch login/register) -->
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <!-- LOGIN FORM -->
        <div class="animate form login_form">
            <section class="login_content">
                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => ['template' => "{input}\n{error}"],
                ]); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true, 'placeholder' => 'Username'])
                    ->label(false) ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['placeholder' => 'Password'])
                    ->label(false) ?>

                <div class="form-group">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', [
                        'class' => 'btn btn-primary btn-block',
                        'name' => 'login'
                    ]) ?>
                </div>

                <p class="reset_pass"><a href="#">Lost your password?</a></p>

                <?php ActiveForm::end(); ?>

                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="#signup" class="to_register"> Create Account </a>
                    </p>
                </div>
            </section>
        </div>

        <!-- REGISTER FORM -->
        <!-- <div id="register" class="animate form registration_form">
            <section class="login_content">
                <h1>Create Account</h1>

                <?php $form = ActiveForm::begin([
                    'id' => 'register-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => ['template' => "{input}\n{error}"],
                ]); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['placeholder' => 'Username', 'required' => true])
                    ->label(false) ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['placeholder' => 'Password', 'required' => true])
                    ->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', [
                        'class' => 'btn btn-primary btn-block',
                        'name' => 'register-button'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>

                <div class="separator">
                    <p class="change_link">Already a member ?
                        <a href="#signin" class="to_register"> Log in </a>
                    </p>
                </div>
            </section>
        </div> -->
    </div>
</div>