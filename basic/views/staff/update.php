<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Staff $model */

$this->title = 'Update Staff: ' . $model->id_staff;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_staff, 'url' => ['view', 'id_staff' => $model->id_staff]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="staff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'staffCategoryList' => $staffCategoryList,
        'personalName' => $personalName,
    ]) ?>

</div>