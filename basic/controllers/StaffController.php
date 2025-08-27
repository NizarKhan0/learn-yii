<?php

namespace app\controllers;

use app\models\Personal;
use app\models\Staff;
use yii\web\Controller;
use app\models\StaffSearch;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Staff models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        // Fetch gender from model Personal that have delcared constant
        $listGender = Personal::GENDER;

        // Fetch staff categories from model Personal that have delcared constant
        $staffCategoryList = Staff::STAFF_CATEGORIES;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'staffCategoryList' => $staffCategoryList,
            'listGender' => $listGender,
        ]);
    }

    /**
     * Displays a single Staff model.
     * @param string $id_staff Id Staff
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_staff)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_staff),
        ]);
    }

    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Staff();

        // Fetch staff categories from model Personal that have delcared constant
        $staffCategoryList = Staff::STAFF_CATEGORIES;

        $personalName = Personal::getAllPersonal();
        // echo '<pre>';
        // print_r($personalName);
        // die;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_staff' => $model->id_staff]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'staffCategoryList' => $staffCategoryList,
            'personalName' => $personalName,
        ]);
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_staff Id Staff
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_staff)
    {
        $model = $this->findModel($id_staff);

        // Fetch staff categories from model Personal that have delcared constant
        $staffCategoryList = Staff::STAFF_CATEGORIES;

        $personalName = Personal::getAllPersonal();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_staff' => $model->id_staff]);
        }

        return $this->render('update', [
            'model' => $model,
            'staffCategoryList' => $staffCategoryList,
            'personalName' => $personalName,
        ]);
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_staff Id Staff
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_staff)
    {
        $this->findModel($id_staff)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_staff Id Staff
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_staff)
    {
        if (($model = Staff::findOne(['id_staff' => $id_staff])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}