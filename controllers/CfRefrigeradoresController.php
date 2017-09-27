<?php

namespace app\controllers;

use Yii;
use app\models\CfRefrigeradores;
use app\models\CfRefrigeradoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfRefrigeradoresController implements the CRUD actions for CfRefrigeradores model.
 */
class CfRefrigeradoresController extends Controller
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
     * Lists all CfRefrigeradores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfRefrigeradoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfRefrigeradores model.
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
     * Creates a new CfRefrigeradores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfRefrigeradores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Refrigerador  {$model->fecha_refrigerador} fue creado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CfRefrigeradores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Refrigerador  {$model->fecha_refrigerador} fue actualizado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfRefrigeradores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CfRefrigeradores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfRefrigeradores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfRefrigeradores::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionGrafic()
    {
        $refriger =  CfRefrigeradores::find()->orderBy('fecha_refrigerador')->all();
        $maxR = count($refriger);
        $congel =  CfRefrigeradores::find()->orderBy('fecha_congelador')->all();
        $maxC = count($congel);
        $freez =  CfRefrigeradores::find()->orderBy('fecha_freezer')->all();
        $maxF = count($freez);

        if ($maxR > 0) {
            for ($i = 0; $i < $maxR; $i++) {
                if ($i < 10) {
                    $Rcategorias[] = $refriger[$i]['fecha_refrigerador'];
                    $graphdataR[] = array(
                        'name' => "Refrigerador",
                        'y' => floatval($refriger[$i]['Temperatura_refrigerador']),
                    );
                }
            }
            for ($i = 0; $i < $maxC; $i++) {
                if ($i < 10) {
                    $Ccategorias[] = $congel[$i]['fecha_congelador'];
                    $graphdataC[] = array(
                        'name' => "Congelador",
                        'y' => floatval($congel[$i]['temperatura_congelador']),
                    );
                }
            }
            for ($i = 0; $i < $maxF; $i++) {
                if ($i < 10) {
                    $Fcategorias[] = $freez[$i]['fecha_freezer'];
                    $graphdataF[] = array(
                        'name' => "Freezer",
                        'y' => floatval($freez[$i]['temperatura_freezer']),
                    );
                }
            }
            return $this->renderAjax("grafics", ['subtitle' => 'Refrigerador', 'subtitle1'=>'Congelador', 'subtitle2'=>'Freezer', 'categorias' => $Rcategorias,'categorias1'=>$Ccategorias,'categorias2'=>$Fcategorias,
                'titlep' => 'Temperatura',  'graphdata' => $graphdataR,'graphdata1'=>$graphdataC,'graphdata2'=>$graphdataF,]);
        }
    }







}
