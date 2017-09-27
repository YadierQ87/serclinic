<?php

namespace app\controllers;

use app\models\CfPrepareDoses;
use Yii;
use app\models\CfReport;
use app\models\CfReportSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\CfMedicalConsultation;
use app\models\CfMedicalConsultationSearch;
use yii\filters\VerbFilter;

/**
 * CfReportController implements the CRUD actions for CfReport model.
 */
class CfReportController extends Controller
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
     * Lists all CfReport models.
     * @return mixed
     */
    public function actionIndex()
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

    public function actionReportado()
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

    /**
     * Displays a single CfReport model.
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
     * Creates a new CfReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new CfReport();
        $medical_consultation = CfMedicalConsultation::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $medical_consultation->status = 'Reportado';
            $medical_consultation->save(false);
            $especialista = Yii::$app->request->post('h_especialistas');
            $model->specialist = $especialista;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Reporte creado satisfactoriamente!!');
            return $this->redirect(['index']);

        } else {

            $listadoEstudios = $this->getAllStudiosByPatient($id);
            return $this->renderAjax('create', [
                'model' => $model,'mcf'=>$medical_consultation,'listadoEstudios'=>$listadoEstudios,
            ]);
        }
    }

    /**
     * Updates an existing CfReport model.
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
     * Deletes an existing CfReport model.
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
     * Finds the CfReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfReport the loaded model
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

    public function getAllStudiosByPatient($id){

        $searchModel = new CfMedicalConsultationSearch();
        $consulta = CfMedicalConsultation::findOne($id);
        $lista_consultas = array();
        $lista_consultas[] = $consulta;
        $padreConsulta = $searchModel->searchParent($consulta->cfMedicalStudy->parent_id,$consulta->cf_patient_id);

        while(is_array($padreConsulta) && count($padreConsulta)>0){
            $objPadre=CfMedicalConsultation::findOne($padreConsulta[0]["id"]);
            $lista_consultas[] = $objPadre;
            $padreConsulta= $searchModel->searchParent($objPadre->cfMedicalStudy->parent_id,$consulta->cf_patient_id);
        }
        return $lista_consultas;
    }
}
