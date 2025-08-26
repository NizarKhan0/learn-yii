<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Personal;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\PersonalSearch;
use Faker\Provider\ar_EG\Person;
use yii\web\NotFoundHttpException;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
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
     * Lists all Personal models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        //debug
        // echo "<pre>";
        // print_r($dataProvider->models);
        // die;

        //bole filter dari sini buat query
        // $dataProvider->query->where(['gender' => 'male']);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
     * @param string $id_personal Id Personal
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_personal)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_personal),
        ]);
    }

    /**
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Personal();
        $martialStatus = Personal::MARTIAL_STATUS;
        // print_r($martialStatus);
        // die;
        $religion = Personal::RELIGION;
        $education = Personal::EDUCATION;

        // Or if you want to use full_name as both value and label
        // $getDataFromModel = ArrayHelper::map(Personal::find()->select(['full_name'])->asArray()->all(), 'full_name', 'full_name');
        // echo "<pre>";
        // print_r($getDataFromModel);
        // die;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())
                && $model->save()) {
                // $model->birth_date = \Yii::$app->formatter->asDate($model->birth_date, 'yyyy-MM-dd');
                // $model->save();
                //utk check data success ke tak
                // echo "<pre>";
                // print_r($model);
                // exit;
                // dd($model->attributes);
                // dd($this->request->post());
                return $this->redirect(['view', 'id_personal' => $model->id_personal]);
            }
        } else {
            $model->loadDefaultValues();
        }

        
        // Then you can't inspect what's going on in between. The && makes it one atomic operation 
        // — if something fails, it won't tell you why unless you dig deeper.
        // Handle different types of failures separately (e.g., load() fails vs save() fails).
        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post())) {
        //         // Debug post data
        //         dd($this->request->post());
                
        //         // Or debug model attributes
        //         dd($model->attributes);
                
        //         if ($model->save()) {
        //             return $this->redirect(['view', 'id_personal' => $model->id_personal]);
        //         }
        //     }
        // }

        return $this->render('create', [
            'model' => $model,
            'martialStatus' => $martialStatus,
            'religion' => $religion,
            'education' => $education,
            // 'getDataFromModel' => $getDataFromModel,
        ]);
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_personal Id Personal
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_personal)
    {
        $model = $this->findModel($id_personal);
        // $model->birth_date = date('d-M-Y', strtotime($model->birth_date));
        $martialStatus = Personal::MARTIAL_STATUS;
        // print_r($martialStatus);
        // die;
        $religion = Personal::RELIGION;
        $education = Personal::EDUCATION;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_personal' => $model->id_personal]);
        }

        return $this->render('update', [
            'model' => $model,
            'martialStatus' => $martialStatus,
            'religion' => $religion,
            'education' => $education,
            // 'getDataFromModel' => $getDataFromModel,
        ]);
    }

    /**
     * Deletes an existing Personal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_personal Id Personal
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_personal)
    {
        $this->findModel($id_personal)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_personal Id Personal
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_personal)
    {
        if (($model = Personal::findOne(['id_personal' => $id_personal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}