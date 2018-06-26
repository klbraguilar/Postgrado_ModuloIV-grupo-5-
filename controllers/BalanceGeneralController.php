<?php

namespace app\controllers;

use Yii;
use app\models\BalanceGeneral;
use app\models\BalanceGeneralSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BalanceGeneralController implements the CRUD actions for BalanceGeneral model.
 */
class BalanceGeneralController extends Controller
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
     * Lists all BalanceGeneral models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BalanceGeneralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BalanceGeneral model.
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
     * Creates a new BalanceGeneral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BalanceGeneral();

        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->idbalance]);
            $connection = Yii::$app->getDb();
            $fechaInicio = $model->fechainicio;
            $fechaFin = $model->fechafin;
            $sql = "exec dbo.BalanceGeneralQuery '" . $fechaInicio . "', '" . $fechaFin . "'";
            $command = $connection->createCommand($sql);
            $result = $command->queryAll();

            $sqlI = "Select SUM(haber - debe) as Ingreso from transaccion t, plancuentas p, comprobante c
                    where t.idplc = p. id and t.idcomp = c.id and p.cuenta like '4%'
                    and c.fecha between '2017-01-01' and '2017-12-31'";
            $command2 = $connection->createCommand($sqlI);
            $ingresos = $command2->queryOne();

            $sqlE = "Select SUM(haber - debe) as  Egreso from transaccion t, plancuentas p, comprobante c
                    where t.idplc = p. id and t.idcomp = c.id or p.cuenta like '5%' or p.cuenta like '6%'
                    and c.fecha between '2017-01-01' and '2017-12-31'";
            $command3 = $connection->createCommand($sqlE);
            $egresos = $command3->queryOne();

            $resultado = $ingresos['Ingreso'] - $egresos['Egreso'];
            return $this->render('balance', [
                'results' => $result, 'inicio' => $fechaInicio, 'fin' => $fechaFin, 'resultados' => $resultado
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BalanceGeneral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idbalance]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BalanceGeneral model.
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
     * Finds the BalanceGeneral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BalanceGeneral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BalanceGeneral::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
