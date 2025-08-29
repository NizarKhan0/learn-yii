<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <h1 class="text-center">
                    <?= Html::encode($this->title) ?>
                </h1>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{input}\n{error}",
                    ],
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username']) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password']) ?>

                <div class="form-group">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>

                <div class="clearfix"></div>

                <p class="reset_pass"><a href="#">Lost your password?</a></p>

                <?php ActiveForm::end(); ?>

                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="#signup" class="to_register"> Create Account </a>
                    </p>
                    <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>