<?php

namespace app\controllers;

use Yii;
use app\models\CfNombreHospitales;
use app\models\CfNombreHospitalesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\CfMunicipio;

/**
 * CfNombreHospitalesController implements the CRUD actions for CfNombreHospitales model.
 */
class CfNombreHospitalesController extends Controller
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
     * Lists all CfNombreHospitales models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfNombreHospitalesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfNombreHospitales model.
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
     * Creates a new CfNombreHospitales model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfNombreHospitales();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(Yii::$app->request->post('region'))
                $model->municipio_id = Yii::$app->request->post('region');
            $model->save(false);
            Yii::$app->session->setFlash('success', html_entity_decode("Hospital {$model->nombre} fue creado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionSelection()
    {
        $idprov = Yii::$app->request->get('idprov');
        return  Html::dropDownList('region','',ArrayHelper::map(CfMunicipio::find()->where("id_cf_provincia='$idprov'")->all(), 'id', 'nombre'),
            ['id'=>'region','class'=>'form-control',]);
    }

    /**
     * Updates an existing CfNombreHospitales model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Hospital  {$model->nombre} fue actualizado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfNombreHospitales model.
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
     * Finds the CfNombreHospitales model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfNombreHospitales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfNombreHospitales::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
