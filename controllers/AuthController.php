<?php
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost())
        {
            if($request->getActionButton() === 'submit')
            {
                $loginForm->loadData($request->getBody());
                if($loginForm->validate() && $loginForm->login())
                {
                    $response->redirect('/');
                    return;
                }
            }
            else if($request->getActionButton() === 'cancel'){
                Application::$app->response->redirect('/');
                exit();
            }
            
        }
        $this->setLayout('auth');
        return $this->render('login', ['model' => $loginForm]);
    }
    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost())
        {
            if($request->getActionButton() === 'submit')
            {
                $data = $request->getBody();
                
                $user->loadData($data);
                if($user->validate() && $user->save())
                {
                    Application::$app->session->setFlash('success','Thinks for registring');
                    Application::$app->response->redirect('/');
                    exit();
                }
            }
            else if($request->getActionButton() === 'cancel'){
                Application::$app->response->redirect('/');
                exit();
            }
            
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}