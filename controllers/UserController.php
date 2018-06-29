<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


class UserController extends Controller{
    protected $session =null;

    public function behaviors(){
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'register'  => ['GET'],
                    'view'      => ['GET'],
                    'create'    => ['POST'],
                    'login'     => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action){
        switch ($action->id){
            case "login":
            case "logout":
            case "view":
                $this->session = Yii::$app->session;
                break;
        }

        return parent::beforeAction($action);
    }


    public function actionLogin(){
        $data=Yii::$app->request->post();

        $user   =isset($data["user"])   ? $data["user"] : "";
        $pwd    =isset($data["pwd"])    ? $data["pwd"]  : "";

        $users=Usuarios::find()
            ->select(['pwd'])
            ->where(['user' => $user])
            ->one();

        if (sizeof($users)==1){
            $aUsers = ArrayHelper::toArray($users);

            if ($aUsers["pwd"]==hash("sha256",$pwd)){
                $this->session->set('user',$user);

                $res=array('success'=>true);
            }else{
                $res=array('success'=>false);
            }
        }else{
            $res=array('success'=>false);
        }

        return $this->asJson($res);
    }


    public function actionLogout(){
        $this->session->remove('user');

        $this->redirect(array('site/'));
    }


    public function actionView(){
        if ($this->session->has('user')){

            $query = Usuarios::find();

            $users=$query->all();

            return $this->render('view', [
                'users' => $users
            ]);
        }else{
            $this->redirect(array('site/'));
        }
    }


    public function actionRegister(){
        return $this->render('register');
    }


    public function actionCreate(){
        $data=Yii::$app->request->post();

        $usuario = new Usuarios();
        $usuario->user  =$data["user"];
        $usuario->pwd   =hash("sha256",$data["pwd"]);

        if ($usuario->save()){
            $res=array('success'=>true);
        }else{
            $res=array('success'=>false);
        }

        return $this->asJson($res);
    }
}
