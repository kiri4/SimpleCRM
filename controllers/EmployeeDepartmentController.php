<?php

namespace app\controllers;

use app\components\DepartmentCenter;
use app\models\Department;
use Yii;
use app\models\EmployeeDepartment;
use app\models\EmployeeDepartmentSearch;
use yii\web\NotFoundHttpException;

/**
 * EmployeeDepartmentController implements the CRUD actions for EmployeeDepartment model.
 */
class EmployeeDepartmentController extends BaseController
{

    /**
     * Lists all EmployeeDepartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeDepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EmployeeDepartment model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EmployeeDepartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmployeeDepartment();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->save();


            if (Yii::$app->request->post('exit'))
                return $this->redirect(['index']);
            else
                return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EmployeeDepartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->save();

            if (Yii::$app->request->post('exit'))
                return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EmployeeDepartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (!DepartmentCenter::deleteEmployee($model->employee_id, $model->department_id)) {
            Yii::$app->session->setFlash('error', 'Удаление не произошло!');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the EmployeeDepartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return EmployeeDepartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmployeeDepartment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
