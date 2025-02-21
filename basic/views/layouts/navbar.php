<?php

use yii\helpers\Html;

?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <!-- <a href="<?= \yii\helpers\Url::home() ?>" class="nav-link">Home</a> -->
            <a href="<?= yii\helpers\Url::to(['site/index']) ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= yii\helpers\Url::to(['site/contact']) ?>" class="nav-link">Contact</a>
        </li>
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Others</a>
            <ul aria-labelledby="dropdownSubMenu1" class="border-0 shadow dropdown-menu">
                <li><a href="<?= yii\helpers\Url::to(['site/about']) ?>" class="dropdown-item">About </a></li>
                <li><a href="<?= yii\helpers\Url::to(['personal/index']) ?>" class="dropdown-item">Personal </a></li>
                <li><a href="<?= yii\helpers\Url::to(['site/hello-world']) ?>" class="dropdown-item">Hello World </a></li>
                <li><?= Html::a('Sign out', ['site/logout'], ['data-method' => 'post', 'class' => 'dropdown-item']) ?>
                </li>
                <!-- <li class="dropdown-divider"></li> -->
            </ul>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="ml-3 form-inline">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="ml-auto navbar-nav">
        <li class="nav-item">
            <?= Html::a('<i class="fas fa-sign-out-alt"></i>', ['/site/logout'], ['data-method' => 'post', 'class' => 'nav-link']) ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->