<?php

namespace app\controllers;

use Yii;
use app\models\CfWorker;
use app\models\CfWorkerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CfMunicipio;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * CfWorkerController implements the CRUD actions for CfWorker model.
 */
class CfWorkerController extends Controller
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
     * Lists all CfWorker models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfWorkerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfWorker model.
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
     * Creates a new CfWorker model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfWorker();
        if(Yii::$app->request->post('region'))
            $model->region = Yii::$app->request->post('region');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $dir_subida = "docs-worker/{$model->firstname}{$model->id}/";
            $fichero_subido = $dir_subida . $model->firstname . $model->id . ".jpg";
            if (!file_exists($dir_subida))
                mkdir($dir_subida, 777);
            if (move_uploaded_file($_FILES['fichero_jpg']['tmp_name'], $fichero_subido)) {
                $model->photo = $fichero_subido;
                $model->save();
            }
            Yii::$app->session->setFlash('success', html_entity_decode("Trabajador {$model->firstname} fue creado!!"));
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

    /**
     * Updates an existing CfWorker model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Trabajador {$model->firstname} fue actualizado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfWorker model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $dir_subida = "docs-worker/{$model->firstname}{$model->id}/";
        $this->eliminarDir($dir_subida);
        Yii::$app->session->setFlash('success', html_entity_decode("Trabajador {$model->firstname} fue eliminado!!"));
        $model->delete();
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
     * Finds the CfWorker model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfWorker the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfWorker::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
