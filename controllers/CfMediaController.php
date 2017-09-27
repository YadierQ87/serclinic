<?php

namespace app\controllers;

use Yii;
use app\models\CfMedia;
use app\models\CfMediaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfMediaController implements the CRUD actions for CfMedia model.
 */
class CfMediaController extends Controller
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
     * Lists all CfMedia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMediaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfMedia model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CfMedia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfMedia();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $dir_subida = 'archivos_media/';
            $fichero_subido = $dir_subida . basename($_FILES['nombre_doc']['name']);
            $nombre = $_FILES['nombre_doc']['name'];
            if($this->caracteresValidos($nombre))
            {
                if (move_uploaded_file($_FILES['nombre_doc']['tmp_name'], $fichero_subido)) {
                    Yii::$app->session->setFlash('success', 'El fichero fue enviado correctamente');

                } else {
                    Yii::$app->session->setFlash('danger', 'El fichero no pudo ser enviado!');
                    return $this->render('create', ['model' => $model]);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing CfMedia model.
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
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfMedia model.
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
     * Finds the CfMedia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfMedia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfMedia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    private function caracteresValidos($cadena)
    {
        $ascii = '';
        $cantCars = strlen($cadena);
        for ($i = 0; $i < $cantCars; $i++)
        {
            $car = $cadena[$i];
            $ascii = ord($cadena[$i]);
            if(!in_array($ascii, [32,40,41,43,44,45,46,48,49,50,51,52,53,54,55,56,57,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,93,95,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122]))
                return false;
        }
        return true;
    }
}
