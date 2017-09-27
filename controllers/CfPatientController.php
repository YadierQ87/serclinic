<?php

namespace app\controllers;

use Yii;
use app\models\CfPatient;
use app\models\CfMedicalConsultation;
use app\models\CfPatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CfMunicipio;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * CfPatientController implements the CRUD actions for CfPatient model.
 */
class CfPatientController extends Controller
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
     * Lists all CfPatient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfPatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfPatient model.
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
     * Creates a new CfPatient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $model = new CfPatient();
        if(Yii::$app->request->post('region'))
            $model->region = Yii::$app->request->post('region');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $dir_subida = "docs-patient/{$model->firstname}{$model->id}/";
            $fichero_subido = $dir_subida . $model->personal_id.".jpg";
            if (!file_exists($dir_subida))
                mkdir($dir_subida,777);
            if (move_uploaded_file($_FILES['fichero_jpg']['tmp_name'], $fichero_subido)) {
                $model->photo = $fichero_subido;
                $model->save();
            }
            Yii::$app->session->setFlash('success', html_entity_decode("Paciente {$model->firstname} fue creado!!"));
            return $this->redirect(['index']);
        }
        else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionSelection()
    {
        $idprov = Yii::$app->request->get('idprov');
        return  Html::dropDownList('region','',ArrayHelper::map(CfMunicipio::find()->where("id_cf_provincia='$idprov'")->all(), 'nombre', 'nombre'),
            ['id'=>'region','class'=>'form-control',]);
    }



    public function actionHistorial($id){
        $model = $this->findModel($id);
        $searchModel = new CfPatientSearch();
        $dataProvider = $searchModel->historial($id);

        return $this->render('historial', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,

        ]);
    }

    public function actionReporte($id){
        $medical_consultation = CfMedicalConsultation::findOne($id);
        return $this->renderAjax('reporteHistorial', [
            'mcf'=>$medical_consultation
        ]);
    }


    /**
     * Updates an existing CfPatient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $dir_subida = "docs-patient/{$model->firstname}{$model->id}/";
            $fichero_subido = $dir_subida . $model->personal_id.".jpg";
            if (!file_exists($dir_subida))
                mkdir($dir_subida,777);
            if (move_uploaded_file($_FILES['fichero_jpg']['tmp_name'], $fichero_subido)) {
                $model->photo = $fichero_subido;
                $model->save();
            }
            Yii::$app->session->setFlash('success', html_entity_decode("Paciente {$model->firstname} fue modificado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfPatient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $name = $model->firstname;
        $dir_subida = "docs-patient/{$model->firstname}{$model->id}/";
        $this->eliminarDir($dir_subida);
        $model->delete();
        Yii::$app->session->setFlash('success', html_entity_decode("Paciente {$name} fue Eliminado!!"));
        return $this->redirect(['index']);
    }


    public function eliminarDir($carpeta)
    {
        foreach (glob($carpeta . "/*") as $archivos_carpeta) {
            echo $archivos_carpeta;

            if (is_dir($archivos_carpeta)) {
                eliminarDir($archivos_carpeta);
            } else {
                unlink($archivos_carpeta);
            }
        }

        rmdir($carpeta);
    }
    /**
     * Finds the CfPatient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfPatient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfPatient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
