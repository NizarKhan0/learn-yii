<?php

use app\models\Personal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PersonalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Personals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // nama field dari database
            // 'id_personal',
            [
                // 'header' => 'Nama Penuh',
                'label' => 'Nama Penuh',
                //utk header table
                'headerOptions' => ['style' => 'width: 200px', 'class' => 'text-center'],
                //utk isi table
                // 'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    // echo '<pre>';
                    // print_r($model);
                    // exit;
                    return $model->full_name;
                }
            ],
            // 'full_name',
            // 'name',
            'gender',
            'birth_location',
            [
                'header' => 'Tarikh Lahir',
                'headerOptions' => ['style' => 'width: 200px', 'class' => 'text-center'],
                'value' => function($model) {
                    return date('d-M-Y', strtotime($model->birth_date));
                }
            ],
            // 'martial_status',
            //'religion',
            //'education',
            'address',
            'no_ic',
            'no_phone',
            'email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Personal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_personal' => $model->id_personal]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
