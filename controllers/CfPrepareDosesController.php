<?php

namespace app\controllers;

use Yii;
use app\models\CfPrepareDoses;
use app\models\CfPrepareDosesSearch;
use app\models\CfMedicalConsultation;
use app\models\CfMedicalConsultationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfPrepareDosesController implements the CRUD actions for CfPrepareDoses model.
 */
class CfPrepareDosesController extends Controller
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
     * Lists all CfPrepareDoses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Recepcionado'];
        $dataProvider = $searchModel->searchStatus($a);
        $date= date("Y/m/d");
        $datosEstudios=$searchModel->searchEstudios($date);

        return $this->render('index', [
            'datos'=>$datosEstudios,
            'tipo'=>'Recepcionado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionEquipo()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Preparado'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('_chequeo_equipos', [


        ]);
    }

    public function actionPreparado()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Preparado'];
        $dataProvider = $searchModel->searchStatus($a);
        $date= date("Y/m/d");
        $datosEstudios=$searchModel->searchEstudios($date);

        return $this->render('index', [
            'datos'=>$datosEstudios,
            'tipo'=>'Preparado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfPrepareDoses model.
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
     * Creates a new CfPrepareDoses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new CfPrepareDoses();
        $medical_consultation = CfMedicalConsultation::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $medical_consultation->status = "Preparado";
            $medical_consultation->save(false);
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model, 'mcf'=>$medical_consultation,
            ]);
        }
    }

    /**
     * Updates an existing CfPrepareDoses model.
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
     * Deletes an existing CfPrepareDoses model.
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
     * Finds the CfPrepareDoses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfPrepareDoses the loaded model
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
