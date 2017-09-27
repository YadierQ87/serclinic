<?php

namespace app\controllers;

use Yii;
use app\models\CfProcessing;
use app\models\CfProcessingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\CfMedicalConsultation;
use app\models\CfImageAcquireStudy;
use app\models\CfMedicalConsultationSearch;
use yii\filters\VerbFilter;

/**
 * CfProcessingController implements the CRUD actions for CfProcessing model.
 */
class CfProcessingController extends Controller
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
     * Lists all CfProcessing models.
     * @return mixed
     */
    public function actionIndex()
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

    public function actionProcesado()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Procesado'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('index', [
            'tipo'=>'Procesado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfProcessing model.
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
     * Creates a new CfProcessing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new CfProcessing();
        $medical_consultation = CfMedicalConsultation::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $medical_consultation->status = "Procesado";
            $medical_consultation->save(false);
            $patient = $model->cfMedicalConsultation->cfPatient;
            $estudio = $model->cfMedicalConsultation->cfMedicalStudy->name;
            $dir_subida = "docs-patient/{$patient->firstname}{$patient->id}/$estudio/";
            if(!file_exists($dir_subida))
                mkdir($dir_subida, 777);
            //before update   capturar variable del fichero
            if (isset($_FILES['fichero_jpg']['tmp_name'])) {
                $timestamp = date("Ymd-His");
                $fichero_foto = $dir_subida .rand(1,120). $timestamp . "-IMG.jpg";
                move_uploaded_file($_FILES['fichero_jpg']['tmp_name'], $fichero_foto);
                $imagenStudy = new CfImageAcquireStudy();
                $imagenStudy->cf_medical_consultation_id = $medical_consultation->id;
                $imagenStudy->img_name_path = $fichero_foto;
                $imagenStudy->process_status = 1;
                $imagenStudy->img_size = $_FILES['fichero_jpg']['size']." bytes";
                $imagenStudy->img_type = $_FILES['fichero_jpg']['type'];
                $imagenStudy->meta_tag = $estudio;
                $imagenStudy->save(false);
                // var_dump($imagenStudy);
            }
            Yii::$app->session->setFlash('success', html_entity_decode("Procesamiento de Imagenes guardado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,'mcf'=>$medical_consultation,
            ]);
        }
    }

    /**
     * Updates an existing CfProcessing model.
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
     * Deletes an existing CfProcessing model.
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
     * Finds the CfProcessing model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfProcessing the loaded model
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
