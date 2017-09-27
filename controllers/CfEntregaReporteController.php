<?php

namespace app\controllers;

use app\models\CfMedicalStudy;
use Yii;
use app\models\CfEntregaReporte;
use app\models\CfEntregaReporteSearch;
use yii\web\Controller;
use app\models\CfMedicalConsultation;
use app\models\CfMedicalConsultationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfEntregaReporteController implements the CRUD actions for CfEntregaReporte model.
 */
class CfEntregaReporteController extends Controller
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
     * Lists all CfEntregaReporte models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Reportado'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('index', [
            'tipo'=>'Reportado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEntregado()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Entregado'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('index', [
            'tipo'=>'Entregado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfEntregaReporte model.
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
     * Creates a new CfEntregaReporte model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new CfEntregaReporte();
        $medical_consultation = CfMedicalConsultation::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $searchModel = new CfMedicalConsultationSearch();
            $medical_consultation->status = 'Entregado';
            $medical_consultation->save(false);
            $a = [null,'Entregado'];
            $dataProvider = $searchModel->searchStatus($a);
            return $this->render('index', [
                'tipo'=>'Entregado',
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,'mcf'=>$medical_consultation
            ]);
        }
    }

    /**
     * Updates an existing CfEntregaReporte model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfEntregaReporte model.
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
     * Finds the CfEntregaReporte model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfEntregaReporte the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfMedicalConsultation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionBusqueda()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $fecha=Yii::$app->request->post('h_fecha');
        $tipo=Yii::$app->request->post('h_tipo');
        $search=Yii::$app->request->post('my-search');
        $a = [$fecha,$tipo,$search];
        $dataProvider = $searchModel->searchSearch($a);

        return $this->render('index', [
            'fecha'=>$fecha,
            'tipo'=>$tipo,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFechax()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $fecha=Yii::$app->request->post('h_date');
        $tipo=Yii::$app->request->post('h_tipo');
        $param=[$fecha,$tipo];
        $dataProvider = $searchModel->searchStatus($param);

        return $this->render('index', [
            'tipo'=>$tipo,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


}
