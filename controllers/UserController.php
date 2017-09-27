<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\search\UserSearch;
use app\models\AccessHelpers;
use app\models\ChangePasswordForm;
use app\models\auditoria\UserAudit;
//use app\models\SignupForm;
use app\models\auditoria\ContAudit;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
   // public $layout = 'main-admin';
    
    public $modelBeforeUpdate;
    
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action))
            return false;
        
        $operacion = Yii::$app->controller->route;
        if (in_array($operacion, ['user/change-password', 'user/my-profile', 'user/update-profile']) || AccessHelpers::getAcceso($operacion))
            return true;
        echo $this->render('/site/error', ['name' => 'Error', 'message' => 'No tiene permiso para ejecutar la acción solicitada']);
        return false;
    }
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['change-password', 'my-profile', 'update-profile'],
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post('my-search'));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionMyProfile()
    {
        return (Yii::$app->user->identity->rol_id == 4) ? $this->render('view', ['model' => $this->findModel(Yii::$app->user->id),]) : $this->render('my-profile', ['model' => $this->findModel(Yii::$app->user->id),]);
    }
    
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $username = Yii::$app->request->post('my-username');
        $my_password = Yii::$app->request->post('my-password');
        $user = Yii::$app->request->post("User");
        $date = date('Y-m-d');
        $rol_id = $user['rol_id'];
        if ($rol_id != "" && $my_password != "" && $username != "")
        {
            if($my_password != $model->password_hash){
                $auth_key = Yii::$app->security->generateRandomString();
                $passw    = Yii::$app->security->generatePasswordHash($my_password);
            }
            else{
                $passw = $model->password_hash;
            }
            $sql = "UPDATE user SET username = '$username', auth_key = '$auth_key', password_hash = '$passw' WHERE id = '$id';";
            $command = Yii::$app->db->createCommand($sql);
            if($command->execute())            {
                Yii::$app->session->setFlash ('success', "Cambios para el usuario $username guardado!!!");
                return $this->redirect(['index']);
            }
        }
        return $this->renderAjax('update', ['model' => $model]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->id == $id)
            return $this->render('/site/error', ['name' => 'Error', 'message' => 'No tiene permiso para ejecutar la acción solicitada']);
        $model = $this->findModel($id);
        $username= $model->nombre;
        $model->delete();
        Yii::$app->session->setFlash ('success', "Usuario $username eliminado!!!");
        $objAudit = new ContAudit(Yii::$app->controller->route, null, new UserAudit($model));
        AuditoriaController::generarTraza($objAudit);
        return $this->redirect(['index']);
    }
    
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionCreate()
    {
        $model = new User();
        $username = Yii::$app->request->post('my-username');
        $my_password = Yii::$app->request->post('my-password');
        $user = Yii::$app->request->post("User");
        $date = date('Y-m-d');
        $rol_id = $user['rol_id'];
        if ($rol_id != "" && $my_password != "" && $username != "")
        {
            $auth_key = Yii::$app->security->generateRandomString();
            $passw    = Yii::$app->security->generatePasswordHash($my_password);
            $sql = "INSERT INTO user (username, auth_key, password_hash,status, rol_id ,created_at, updated_at)
             VALUES ('$username', '$auth_key', '$passw','1','$rol_id','$date','$date');";
            $command = Yii::$app->db->createCommand($sql);
            if($command->execute())            {
                Yii::$app->session->setFlash ('success', "Usuario $username Creado!!!");
                return $this->redirect(['index',]);
            }
        }
        return $this->renderAjax('create', ['model' => $model, ]);
    }
    
    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();
        if ($model->load(Yii::$app->request->post()) && !Yii::$app->user->isGuest)
        {
            $post = Yii::$app->request->post();
            $id = Yii::$app->user->identity->id;
            $user = $this->findModel($id);
            $newPassword = $post['ChangePasswordForm']['new_password'];
            if ($user->validatePassword($post['ChangePasswordForm']['old_password'], $user->password_hash))
            {
                $user->setPassword($newPassword);
                if ($user->save(false));
                {
                    return $this->goBack();
                }
                Yii::$app->session->setFlash('msjError', 'No se han podido guardar los datos');
            }
            Yii::$app->session->setFlash('msjError', 'La contraseña anterior no coincide');
            return $this->render('change-password', ['model' => $model,]);
        }
        return $this->render('change-password', ['model' => $model,]);
        
    }

}
