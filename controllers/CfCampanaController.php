<?php

namespace app\controllers;

use Yii;
use app\models\CfCampana;
use app\models\CfCampanaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfCampanaController implements the CRUD actions for CfCampana model.
 */
class CfCampanaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all CfCampana models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfCampanaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfCampana model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CfCampana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfCampana();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Campana  {$model->fecha} fue creado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CfCampana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Campana  {$model->fecha} fue creado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfCampana model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionGrafic()
    {
        $datos =  CfCampana::find()->orderBy('fecha')->all();
        $maxpa = count($datos);

        if ($maxpa > 0) {
            for ($i = 0; $i < $maxpa; $i++) {
                if ($i < 10) {
                    $pcategorias[] = $datos[$i]['fecha'];
                    $graphdata[] = array(
                        'name' => "Presion",
                        'y' => floatval($datos[$i]['presion']),
                    );
                    $graph[] = array(
                        'name' => "Flujo",
                        'y' => floatval($datos[$i]['flujo_aire']),
                    );
                }
            }
            return $this->renderAjax("grafics", ['subtitle' => '', 'categorias' => $pcategorias,
                'titlep' => 'Presion', 'titlef' => 'Flujo', 'iname' => 'Presion', 'graphdata' => $graphdata, 'graph' => $graph,]);
        }
    }

    /**
     * Finds the CfCampana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfCampana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfCampana::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
