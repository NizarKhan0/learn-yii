<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Personal $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_personal' => $model->id_personal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_personal' => $model->id_personal], [
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
            'id_personal',
            'full_name',
            'name',
            'gender',
            'birth_location',
            'birth_date',
            'martial_status',
            'religion',
            'education',
            'address',
            'no_ic',
            'no_phone',
            'email:email',
        ],
    ]) ?>

</div>
