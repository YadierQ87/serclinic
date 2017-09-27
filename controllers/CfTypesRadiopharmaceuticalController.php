<?php

namespace app\controllers;

use Yii;
use app\models\CfTypesRadiopharmaceutical;
use app\models\CfTypesRadiopharmaceuticalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CfTypesRadiopharmaceuticalController implements the CRUD actions for CfTypesRadiopharmaceutical model.
 */
class CfTypesRadiopharmaceuticalController extends Controller
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
     * Lists all CfTypesRadiopharmaceutical models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CfTypesRadiopharmaceuticalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CfTypesRadiopharmaceutical model.
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
     * Creates a new CfTypesRadiopharmaceutical model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CfTypesRadiopharmaceutical();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success',"Liofilizado {$model->name} Creado!!!");
            return $this->redirect(['/cf-radiopharmaceutical/index']);
        } else {
            return $this->renderAjax('create', [    'model' => $model,   ]);
        }
    }

    public function actionCreate2()
    {
        $model = new CfTypesRadiopharmaceutical();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success',"Liofilizado {$model->name} Creado!!!");
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [    'model' => $model,   ]);
        }
    }

    /**
     * Updates an existing CfTypesRadiopharmaceutical model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success',"Liofilizado {$model->name} fue actualizado!!!");
            return $this->redirect(['/cf-types-radiopharmaceutical/index']);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CfTypesRadiopharmaceutical model.
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
     * Finds the CfTypesRadiopharmaceutical model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CfTypesRadiopharmaceutical the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CfTypesRadiopharmaceutical::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
