<?php

namespace app\controllers;

use Yii;
use app\models\EstadoResultado;
use app\models\EstadoResultadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadoResultadoController implements the CRUD actions for EstadoResultado model.
 */
class EstadoResultadoController extends Controller
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
     * Lists all EstadoResultado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstadoResultadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstadoResultado model.
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
     * Creates a new EstadoResultado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EstadoResultado();

        if ($model->load(Yii::$app->request->post())) {
            $connection = Yii::$app->getDb();
            $fechaInicio = $model->fechainicio;
            $fechaFin = $model->fechafin;
            $sql = "exec dbo.EERRQuery '" . $fechaInicio . "', '" . $fechaFin . "'";
            $command = $connection->createCommand($sql);
            $result = $command->queryAll();

            return $this->render('estado', [
                'results' => $result, 'inicio' => $fechaInicio, 'fin' => $fechaFin
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EstadoResultado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idestadores]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EstadoResultado model.
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

    public function actionEstado()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("Select * from plancuentas");

        $result = $command->queryAll();

        return $this->render('estado', [
            'results' => $result,
        ]);
    }

    /**
     * Finds the EstadoResultado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EstadoResultado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EstadoResultado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
