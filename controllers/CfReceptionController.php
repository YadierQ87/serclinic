<?php

namespace app\controllers;

use app\models\CfMedicalStudy;
use Yii;
use app\models\CfMedicalConsultation;
use app\models\CfMedicalConsultationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * CfReceptionController implements the CRUD actions for CfReception model.
 */
class CfReceptionController extends Controller
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
     * Lists all CfReception models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMedicalConsultationSearch();
     /*  if(!is_null(Yii::$app->request->post('my-search'))){
           $dataProvider = $searchModel->searchRecepcionSearch(Yii::$app->request->post('my-search'));
       }
        else{    */
        $dataProvider = $searchModel->searchRecepcion(Yii::$app->request->post('my-search'));
      //  }

        return $this->render('index', [
            'tipo'=>'Recepcionar',
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

        $type=null;
        if($tipo=='Recepcionado'){$dataProvider = $searchModel->searchStatus($param); $type='Recepcionado';}
        else{$dataProvider = $searchModel->searchRecepcion($fecha);$type='Recepcionar';}

        return $this->render('index', [
            'tipo'=>$type,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBusqueda()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $fecha=Yii::$app->request->post('h_fecha');

        $tipo=Yii::$app->request->post('h_tipo');
        $search=Yii::$app->request->post('my-search');
        $a = [$fecha,$tipo,$search];
        if($tipo=='Recepcionado'){$dataProvider = $searchModel->searchSearch($a);}
        else{$dataProvider = $searchModel->searchBusqueda($a);}

        return $this->render('index', [
            'fecha'=>$fecha,
            'tipo'=>$tipo,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionRecepcionado()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Recepcionado'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('index', [
            'tipo'=>'Recepcionado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single CfReception model.
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
     * Creates a new CfReception model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   /* public function actionCreate()
    {
        $model = new CfReception();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CfReception model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $edad = explode(" ",$model->age);
            if($edad[0] < 18 && $edad[1] == "a�os"){
                //calculo segun dosis para ninnos
            }
            else if($edad[0] > 18 && $edad[1] == "a�os"){
             //calculo IMC
             $tamanno = $model->size/100;
             $IMC = $model->weight/pow($tamanno,2);
                if($IMC < 16.99){
                    $model->bajopeso = 1;
                }
                if($IMC > 30){
                    $model->sobrepeso = 1;
                }
            }
            $model->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,'mcf'=>$model
            ]);
        }
    }

    public function actionCancel($id){
        $model = CfMedicalConsultation::findOne($id);

        if($model){
            $cancelar=array('status'=>'cancelado');
            if ($model->updateAttributes($cancelar)) {
                return $this->redirect(['index']);
            }
        }

    }

    public function actionPosponer($id){
        $model = CfMedicalConsultation::findOne($id);
        $fecha= $this->FechaPropuesta($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('posponer', [
                'model' => $model,
                'fecha'=> $fecha,
            ]);
        }

    }

    public function FechaPropuesta($model)
    {
        $id_cf_medical_study= $model->cfMedicalStudy->id;
        $study =  CfMedicalStudy::findOne($id_cf_medical_study);
        $planificados = $study->planificacion_dias; #arreglo de la planificacion de dias
        $propuestas = array();
        foreach($planificados as $key){
            $date = $this->getFechaByDay($key->day);
            $cantd = $key->quantity - $this->getCantdTurnos($date,$id_cf_medical_study);
            if($cantd!=0){
            $hora = $this->getNextHora($date,$id_cf_medical_study);
            $propuestas[] = " Turnos disponibles:({$cantd}) Dia:({$date})  Hora:({$hora})";
        }}
        return Html::dropDownList('region','',$propuestas,['id'=>'region','class'=>'form-control',]);
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
     * Deletes an existing CfReception model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
  /*  public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CfReception model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfReception the loaded model
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

   /* public function actionArecepcionar()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $dataProvider = $searchModel->searchToday(null);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/



}
