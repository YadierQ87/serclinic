<?php

namespace app\controllers;

use app\models\CfNombreConEstudio;
use app\models\CfPlanificacionDias;
use app\models\CfPlanificacionProcesos;
use Yii;
use app\models\CfMedicalStudy;
use app\models\CfMedicalStudySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfMedicalStudyController implements the CRUD actions for CfMedicalStudy model.
 */
class CfMedicalStudyController extends Controller
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
     * Lists all CfMedicalStudy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMedicalStudySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfMedicalStudy model.
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
     * Creates a new CfMedicalStudy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfMedicalStudy();
        $lunes= Yii::$app->request->post('lunes');
        $martes=Yii::$app->request->post('martes');
        $miercoles=Yii::$app->request->post('miercoles');
        $jueves=Yii::$app->request->post('jueves');
        $viernes=Yii::$app->request->post('viernes');
        $sabado=Yii::$app->request->post('sabado');
        $dom=Yii::$app->request->post('domingo');
        //$h_Procesos = explode(";",Yii::$app->request->post('h_Procesos'));
        $h_zonas =Yii::$app->request->post('h_zonas');
        $h_nombre_radio =Yii::$app->request->post('h_nombre_radio');
        $model->administer_doses_zone = $h_zonas;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $arraydias = array($lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$dom);
            $max = count($arraydias);
            for($i=0;$i<$max;$i++)        {
                if($arraydias[$i]>0){
                    $mplan = new CfPlanificacionDias();
                    $mplan->day = $i;
                    $mplan->quantity = $arraydias[$i];
                    $mplan->id_cf_med_study = $model->id;
                    $mplan->save();
                }
            }

            $h_nombre_radio = explode(',',$h_nombre_radio);
            $max = count($h_nombre_radio);
            for($i=0; $i< $max;$i++)        {
                $mradio = new CfNombreConEstudio();
                $mradio->id_cf_medical_study = $model->id;
                $mradio->id_cf_nombre_radiofarmaco = $h_nombre_radio[$i];
                $mradio->save();
            }
            Yii::$app->session->setFlash('success', html_entity_decode("Estudio m&eacute;dico {$model->name} fue creado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CfMedicalStudy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Estudio m&eacute;dico {$model->name} fue modificado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfMedicalStudy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Yii::$app->session->setFlash('success', "Estudio medico {$model->name} fue eliminado!!");
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the CfMedicalStudy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfMedicalStudy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfMedicalStudy::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
