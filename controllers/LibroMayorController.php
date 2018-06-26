<?php

namespace app\controllers;

use app\models\Plancuentas;
use Yii;
use app\models\LibroMayor;
use app\models\LibroMayorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LibroMayorController implements the CRUD actions for LibroMayor model.
 */
class LibroMayorController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LibroMayor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LibroMayorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LibroMayor model.
     * @param integer $id
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
     * Creates a new LibroMayor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LibroMayor();

        if ($model->load(Yii::$app->request->post())) {
            $cuenta = Plancuentas::findOne($model->idcuenta);
            $connection = Yii::$app->getDb();
            $fechaInicio = $model->fechainicio;
            $fechaFin = $model->fechafin;
            $idcuenta = $model->idcuenta;
            $sql = "exec dbo.LibroMayorQuery '" . $fechaInicio . "', '" . $fechaFin . "', ". $idcuenta;
            $command = $connection->createCommand($sql);

            $result = $command->queryAll();

            return $this->render('mayor', [
                'results' => $result, 'inicio' => $fechaInicio, 'fin' => $fechaFin, 'cuenta' => $cuenta->nombre
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing LibroMayor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idlibromay]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LibroMayor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LibroMayor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LibroMayor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LibroMayor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
