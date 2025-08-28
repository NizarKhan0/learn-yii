<?php

namespace app\controllers;

use Yii;
use app\models\Staff;
use yii\db\Transaction;
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
        $modelStaff = new Staff();
        $martialStatus = Personal::MARTIAL_STATUS;
        // print_r($martialStatus);
        // die;
        $religion = Personal::RELIGION;
        $education = Personal::EDUCATION;
        // Fetch staff categories from model Personal that have delcared constant
        $staffCategoryList = Staff::STAFF_CATEGORIES;
        $personalName = Personal::getAllPersonal();

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // die;

        // Or if you want to use full_name as both value and label
        // $getDataFromModel = ArrayHelper::map(Personal::find()->select(['full_name'])->asArray()->all(), 'full_name', 'full_name');
        // echo "<pre>";
        // print_r($getDataFromModel);
        // die;

        if ($this->request->isPost) {
            // Begin transaction
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                // Load and save first model
                if ($model->load($this->request->post()) && $model->save()) {

                    // echo "<pre>";
                    // print_r($model->attributes);
                    // die;

                    // Now load and save second model, link if needed
                    if ($modelStaff->load($this->request->post())) {

                        // Set foreign key
                        $modelStaff->id_personal = $model->id_personal;
                        // echo "<pre>";
                        // print_r($modelStaff->attributes);
                        // die;

                        // Jika ada relationship, set foreign key
                        // $modelStaff->id_personal = $model->id_personal;
                        if ($modelStaff->save()) {
                            // Commit transaction jika semua sukses
                            $transaction->commit();
                            
                            // Tampilkan pesan sukses
                            Yii::$app->session->setFlash('success', 'Data created successfully.');

                            return $this->redirect(['personal/index']);
                            //ini untuk redirect ke view id yg bnaru dibuat
                            // return $this->redirect(['view', 'id_personal' => $model->id_personal]);
                        } else {
                            // Jika modelStaff gagal disimpan
                            throw new \Exception('Failed to save staff model');
                        }
                    } else {
                        throw new \Exception('Failed to load staff data');
                    }
                } else {
                    throw new \Exception('Failed to save personal data');
                }
            } catch (\Exception $e) {
                // Rollback transaction jika ada error
                $transaction->rollBack();
                // Tampilkan error atau handle sesuai kebutuhan
                Yii::$app->session->setFlash('error', $e->getMessage());
                return $this->redirect(Yii::$app->request->referrer);
            }
        } else {
            $model->loadDefaultValues();
            $modelStaff->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelStaff' => $modelStaff,
            'martialStatus' => $martialStatus,
            'religion' => $religion,
            'education' => $education,
            'personalName' => $personalName,
            'staffCategoryList' => $staffCategoryList,
        ]);
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_personal Id Personal
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_personal) // WAJIB ada ID untuk update
    {
        // 1. Cari model utama (Personal) berdasarkan ID
        $model = $this->findModel($id_personal);

        // 2. Cari model kedua (Staff) yang related
        // Andaian: Setiap Personal mempunyai SATU Staff profile
        $modelStaff = Staff::find()->where(['id_personal' => $id_personal])->one();

        $martialStatus = Personal::MARTIAL_STATUS;
        // print_r($martialStatus);
        // die;
        $religion = Personal::RELIGION;
        $education = Personal::EDUCATION;
        // Fetch staff categories from model Personal that have delcared constant
        $staffCategoryList = Staff::STAFF_CATEGORIES;
        $personalName = Personal::getAllPersonal();


        // Jika tidak jumpa, create baru (fallback - optional)
        if ($modelStaff === null) {
            $modelStaff = new Staff();
            $modelStaff->id_personal = $id_personal; // Set foreign key
        }

        // 3. Handle form submission
        if ($this->request->isPost) {

            // MUATNAIKAN (LOAD) data dari form
            $model->load($this->request->post());
            $modelStaff->load($this->request->post());

            // BEGIN TRANSACTION untuk ensure consistency
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                // SIMPAN kedua-dua model
                if ($model->save() && $modelStaff->save()) {
                    $transaction->commit(); // Commit jika semua berjaya
                    \Yii::$app->session->setFlash('success', 'Data updated successfully.');
                    return $this->redirect(['personal/index']);
                    // return $this->redirect(['view', 'id_personal' => $model->id_personal]);
                } else {
                    // Jika save gagal, throw exception dengan error messages
                    $errors = array_merge($model->getFirstErrors(), $modelStaff->getFirstErrors());
                    throw new \yii\base\Exception(implode(', ', $errors));
                }
            } catch (\Exception $e) {
                $transaction->rollBack(); // Rollback jika ada error
                \Yii::$app->session->setFlash('error', 'Update failed: ' . $e->getMessage());
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        // 4. Render form
        return $this->render('update', [
            'model' => $model,
            'modelStaff' => $modelStaff,
            'martialStatus' => $martialStatus,
            'religion' => $religion,
            'education' => $education,
            'personalName' => $personalName,
            'staffCategoryList' => $staffCategoryList,
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
        //delete relation from staff table integrity constraint
        $staff = Staff::find()->where(['id_personal' => $id_personal])->one();
        $staff->delete();
        $this->findModel($id_personal)->delete();
        Yii::$app->session->setFlash('success', 'Data deleted successfully.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_personal Id Personal
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    // Helper function untuk find model Personal
    protected function findModel($id_personal)
    {
        if (($model = Personal::findOne(['id_personal' => $id_personal])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}