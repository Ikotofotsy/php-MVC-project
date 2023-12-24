<?php
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{
    public function home()
    {
        return $this->render('home');
    }
    public function user()
    {
        return $this->render ('user');
    }
    public function handleUser(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return "traiter user form";
    }
}