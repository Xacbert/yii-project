<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class UserController extends Controller{

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


    public function actionLogin(){
        $data=Yii::$app->request->post();

        $user   =isset($data["user"])   ? $data["user"] : "";
        $pwd    =isset($data["pwd"])    ? $data["pwd"]  : "";

        $users=Usuario::find()
                ->where(['user' => $user])
                ->one();

        if (sizeof($users)==1){
            if ($users[0]->pwd==hash("sha256",$pwd)){
                $res=array('success'=>true);
            }else{
                $res=array('success'=>false);
            }
        }else{
            $res=array('success'=>false);
        }

        return $this->asJson($res);
    }


    public function actionView(){
        $query = Usuario::find();

        $users=$query->all();

        return $this->render('list', [
            'users' => $users
        ]);
    }


    public function actionRegister(){
        return $this->render('register');
    }


    public function actionCreate(){
        $data=Yii::$app->request->post();

        $usuario = new Usuario();
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
