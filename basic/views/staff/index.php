<?php

use app\models\Staff;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\StaffSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_staff',
            // 'id_personal',

            // cara 1
            // 'personal.full_name',
            [
                'attribute' => 'full_name',
                'value' => function($model){
                    return $model->personal->full_name;
                }
            ],

            // cara 2
            [
                'attribute' => 'gender',
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function($model){
                    return $model->personal->gender;
                }
            ],
            [
                'attribute' => 'address',
                'headerOptions' => ['style' => 'width:150px;'],
                'value' => function($model){
                    return $model->personal->address;
                }
            ],

            // cara 3
            [
                'label' => 'IC Number',
                'attribute' => 'no_ic',
                'value' => function($model) {
                    return $model->personal->no_ic;
                }
            ],
            
            'staff_category',
            'staff_status',
            'department',
            //'start_date',
            //'salary',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Staff $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_staff' => $model->id_staff]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>