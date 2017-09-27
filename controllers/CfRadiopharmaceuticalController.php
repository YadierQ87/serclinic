<?php

namespace app\controllers;

use Yii;
use app\models\CfRadiopharmaceutical;
use app\models\CfRadiopharmaceuticalSearch;
use app\models\CfTypesRadiopharmaceutical;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * CfRadiopharmaceuticalController implements the CRUD actions for CfRadiopharmaceutical model.
 */
class CfRadiopharmaceuticalController extends Controller
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
     * Lists all CfRadiopharmaceutical models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfRadiopharmaceuticalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSelection()
    {
        $idlio = Yii::$app->request->get('idlio');
        $liofilizado = CfTypesRadiopharmaceutical::find()->where("id='$idlio'")->all();
        $nombre = ($liofilizado[0]['name']);
        return  Html::dropDownList('lotes','',
            ArrayHelper::map(CfTypesRadiopharmaceutical::find()->where("name='$nombre'")->all(), 'batch', 'batch'),
            ['id'=>'lotes','class'=>'form-control','required'=>'required']);
    }

    /**
     * Displays a single CfRadiopharmaceutical model.
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
     * Creates a new CfRadiopharmaceutical model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfRadiopharmaceutical();
        $model->lote_utilizado = Yii::$app->request->post('lotes');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success',html_entity_decode("Radiof&aacute;rmaco {$model->name} Creado!!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CfRadiopharmaceutical model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success',html_entity_decode("Radiof&aacute;rmaco {$model->name} fue actualizado!!"));
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfRadiopharmaceutical model.
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
     * Finds the CfRadiopharmaceutical model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfRadiopharmaceutical the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfRadiopharmaceutical::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
