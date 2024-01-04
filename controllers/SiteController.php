<?php
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Langage;
use app\models\UserLangage;
use app\models\UserUpdate;

class SiteController extends Controller{
    public function home()
    {
        return $this->render('home');
    }
    public function profile()
    {
        return $this->render('user/profile');
    }
    public function user()
    {
        return $this->render('user/user');
    }
    public function userUpdate(Request $request)
    {
        if($request->isPost())
        {
            if($request->getActionButton() === 'cancel')
            {
                return $this->render('user/profile');
            }
            else if($request->getActionButton() === 'update')
            {
                $user = new UserUpdate();
                $data = $request->getBody();
                array_unshift($data,Application::$app->user->primaryKeyValues());
                
                $user->loadData($data); 
                if($user->validate() && $user->update())
                {
                    Application::$app->session->setFlash('success','Update Succes');
                    Application::$app->response->redirect('/profile');
                    exit();
                }
            }
        }
        return $this->render('user/update');
    }
    public function handleUser(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return "traiter user form";
    }
    public function addLangageForUser(Request $request)
    {
        if($request->isPost())
        {
            if($request->getActionButton() === 'cancel')
            {
                return $this->render('user/profile');
            }
            else if($request->getActionButton() === 'submit')
            {
                
                $langage = new UserLangage();
                $data = $request->getBody();
                $user['user'] = Application::$app->user->primaryKeyValues()[implode('',Application::$app->user->primaryKey())];
                $data = array_merge($user,$data);
                $data = array_map(fn($val) => (int)$val, $data);
                $langage->loadData($data); 
                if($langage->validate() && $langage->save())
                {
                    Application::$app->session->setFlash('success','Thinks for registring');
                    Application::$app->response->redirect('/profile');
                    exit();
                }
            }
        }
        return $this->render('langage/add');
    }
    public function langage(Request $request)
    {
        if($request->isPost())
        {
            if($request->getActionButton() === 'cancel')
            {
                return $this->render('langage/add');
            }
            else if($request->getActionButton() === 'submit')
            {
                $langage = new Langage();
                $data = $request->getBody();
                $langage->loadData($data); 
                if($langage->validate() && $langage->save())
                {
                    Application::$app->session->setFlash('success','Thinks for registring');
                    Application::$app->response->redirect('/langage');
                    exit();
                }
            }
        }
        return $this->render('langage/form');
    }
}