<?php

namespace app\controllers;

use app\models\CfImageAcquireStudy;
use Yii;
use app\models\CfAcquireImage;
use app\models\CfAcquireImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\CfMedicalConsultation;
use app\models\CfMedicalConsultationSearch;
use yii\filters\VerbFilter;

/**
 * CfAcquireImageController implements the CRUD actions for CfAcquireImage model.
 */
class CfAcquireImageController extends Controller
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
     * Lists all CfAcquireImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Administrado'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('index', [
            'tipo'=>'Administrado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionAdquirido()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Adquirido'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('index', [

            'tipo'=>'Adquirido',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfAcquireImage model.
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
     * Creates a new CfAcquireImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new CfAcquireImage();
        $consulta = CfMedicalConsultation::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->cf_medical_consultation_id = $id;
            $model->save(false);
            $consulta->status = 'Adquirido';
            $consulta->save(false);
                Yii::$app->session->setFlash('success', html_entity_decode("Dosis {$model->className()} fue creada!!"));
                return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,'mcf'=>$consulta,
            ]);
        }
    }

    /**
     * Updates an existing CfAcquireImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfAcquireImage model.
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
     * Finds the CfAcquireImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfAcquireImage the loaded model
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
