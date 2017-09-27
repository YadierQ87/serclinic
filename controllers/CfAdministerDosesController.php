<?php

namespace app\controllers;

use Yii;
use app\models\CfAdministerDoses;
use app\models\CfAdministerDosesSearch;
use yii\web\Controller;
use app\models\CfMedicalConsultation;
use app\models\CfMedicalConsultationSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfAdministerDosesController implements the CRUD actions for CfAdministerDoses model.
 */
class CfAdministerDosesController extends Controller
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
     * Lists all CfAdministerDoses models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfMedicalConsultationSearch();
        $a = [null,'Preparado'];
        $dataProvider = $searchModel->searchStatus($a);

        return $this->render('index', [
            'tipo'=>'Preparado',
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionAdministrado()
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

    /**
     * Displays a single CfAdministerDoses model.
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
     * Creates a new CfAdministerDoses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new CfAdministerDoses();
        $consulta = CfMedicalConsultation::findOne($id);
        if ($model->load(Yii::$app->request->post())&& $model->save()) {
            $consulta->status = 'Administrado';
            $consulta->save(false);
            Yii::$app->session->setFlash('success', html_entity_decode("Dosis {$model->className()} fue creada!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model, 'mcf'=>$consulta
            ]);
        }
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

    /**
     * Updates an existing CfAdministerDoses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $mcf  = CfMedicalConsultation::findOne($id);
        $model = $this->findModel($mcf->cfUniqueAdministerDoses->id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', html_entity_decode("Dosis {$model->className()} fue actualizada!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,'mcf'=>$mcf,
            ]);
        }
    }

    /**
     * Deletes an existing CfAdministerDoses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        Yii::$app->session->setFlash('success', html_entity_decode("Dosis {$model->className()} fue eliminada!!"));
        $model->delete();
        return $this->redirect(['index']);
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




    /**
     * Finds the CfAdministerDoses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfAdministerDoses the loaded model
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
