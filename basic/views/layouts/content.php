<?php 
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
?>

<div class="right_col" role="main">
    <?php if (isset($this->params['h1'])): ?>
    <div class="page-title">
        <div class="title_left">
            <h1><?= $this->params['h1'] ?></h1>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="clearfix"></div>

    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>