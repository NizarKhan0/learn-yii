<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Staff $model */

$this->title = $model->id_staff;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_staff' => $model->id_staff], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_staff' => $model->id_staff], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_staff',
            'id_personal',
            'staff_category',
            'staff_status',
            'department',
            'start_date',
            'salary',
        ],
    ]) ?>

</div>
