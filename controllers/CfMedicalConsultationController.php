<?php

namespace app\controllers;

use app\models\CfMedicalStudy;
use app\models\CfPatient;
use Yii;
use app\models\CfMedicalConsultation;
use app\models\CfMedicalConsultationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * CfMedicalConsultationController implements the CRUD actions for CfMedicalConsultation model.
 */
class CfMedicalConsultationController extends Controller
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
     * Lists all CfMedicalConsultation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfMedicalConsultation model.
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
     * Creates a new CfMedicalConsultation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfMedicalConsultation();

        if ($model->load(Yii::$app->request->post())) {
            $hidePatient= Yii::$app->request->post('hidePatient');
            $hideFecha= Yii::$app->request->post('hideFecha');
            $fecha=explode(',',$hideFecha);

            if(!empty($hidePatient)){
                $model->cf_patient_id=$hidePatient;
            }
            if($model->off_calendar==0){
                $model->date_turn=$fecha[1];
                $model->hour_turn=$fecha[2];
            }
            //cuando es externo se guarda el valor del proceso con el cual arribo al centro
            if( $model->is_external == 1){
                $model->status = $model->estado_externo;
            }
            if($model->is_external == 0){
                $model->status = 'Creado';
                $model->estado_externo = '';
            }
            //Verificar en este Paso si existe otro estudio igual para ese Paciente que aun no este cerrado//
            $searchModel = new CfMedicalConsultationSearch();
            $patient = $model->cf_patient_id;
            $otraConsulta = $searchModel->searchParent($model->cfMedicalStudy->id,$patient);
            $padreConsulta = $searchModel->searchParent($model->cfMedicalStudy->parent_id,$patient);
            if(is_array($otraConsulta) && count($otraConsulta)>0){
                Yii::$app->session->setFlash('warning', html_entity_decode("Ya existe un Estudio abierto aun para ese mismo Paciente. Ud debe cerrarlo primero!!"));
                return $this->redirect(['index']);
            }
            //Verificar en este Paso : Si el estudio medico es consecutivo de algun estudio que aun este abierto//
            if(is_array($padreConsulta) && count($padreConsulta)>0){
                $model->parent_id = $padreConsulta[0]["id"];
            }
            $model->save();
            Yii::$app->session->setFlash('success', html_entity_decode("Turno {$model->id} fue creado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionPatient()
    {
            $patient=  Yii::$app->request->get('idPatient');
            $study =  CfPatient::findOne($patient);
            return $this->renderAjax("/cf-medical-consultation/_detailsPatient",["mcf"=>$study]);
    }

    public function actionFechaPropuesta()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id_cf_medical_study = Yii::$app->request->get('id_estudio');
        $study =  CfMedicalStudy::findOne($id_cf_medical_study);
        $planificados = $study->planificacion_dias; #arreglo de la planificacion de dias
        $propuestas = array();
        foreach($planificados as $key){
            $date = $this->getFechaByDay($key->day);
            $cantd = $key->quantity - $this->getCantdTurnos($date,$id_cf_medical_study);
            if($cantd!=0){
            $hora = $this->getNextHora($date,$id_cf_medical_study);
            $propuestas[] = [$cantd,$date,$hora];
        } }
        return $propuestas;
        //json_encode($propuestas);
    }

    public function getFechaByDay($day)    {
        switch ($day) {
            case 0:
                return date('Y-m-d', strtotime('next Monday'));
                break;
            case 1:
                return date('Y-m-d', strtotime('next Tuesday'));
                break;
            case 2:
                return date('Y-m-d', strtotime('next Wednesday'));
                break;
            case 3:
                return date('Y-m-d', strtotime('next Thursday'));
                break;
            case 4:
                return date('Y-m-d', strtotime('next Friday'));
                break;
            case 5:
                return date('Y-m-d', strtotime('next Saturday'));
                break;
            case 6:
                return date('Y-m-d', strtotime('next Sunday'));
                break;
        }
    }

    public function getCantdTurnos($date,$id_cf_medical_study){
       $result = Yii::$app->db->createCommand("SELECT COUNT(DISTINCT id) as cantd FROM cf_medical_consultation WHERE
       cf_medical_study_id = '$id_cf_medical_study' AND date_turn = '$date'")->queryOne();
        return $result['cantd'];
    }

    public function getNextHora($date,$id_cf_medical_study){
        $result = Yii::$app->db->createCommand("SELECT hour_turn as hora FROM cf_medical_consultation WHERE
       cf_medical_study_id = '$id_cf_medical_study' AND date_turn = '$date' ORDER BY hour_turn DESC")->queryAll();
        if(count($result)>0)
            return $result[0]['hora'];
        else
            return "8:00am";
    }

    /**
     * Updates an existing CfMedicalConsultation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            Yii::$app->session->setFlash('success', html_entity_decode("Turno {$model->id} fue actualizado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfMedicalConsultation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Yii::$app->session->setFlash('success', html_entity_decode("Turno {$model->id} fue eliminado!!"));
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the CfMedicalConsultation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfMedicalConsultation the loaded model
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

}
