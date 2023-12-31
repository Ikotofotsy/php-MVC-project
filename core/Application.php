<?php 
namespace app\core;
use app\core\db\Database;
use app\core\db\DbModel;
use app\models\User;
use Exception;

class Application{
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public ?DbModel $user;
    public View $view;
    public static Application $app;
    public ?Controller $controller = null;

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;

        return $this;
    }
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request,$this->response);
        $this->db = new Database($config['db']);
        $this->view = new View();

        $primaryValue = $this->session->get('user');
        if($primaryValue)
        {
            $user = new User(); 
            $user->setPrimaryKeyValue($primaryValue);
            $primaryKey = implode('',$user->primaryKey());
            $this->user = $user->findOne([$primaryKey => $primaryValue]);
        }else
        {
            $this->user = null;
        }
    }
    public static function isGuest()
    {
        return !self::$app->user;
    }
    public function run()
    {
        try{
            echo $this->router->resolve();
        }catch(Exception $e){
            
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('error',[
                'exception' => $e
            ]);
        }
        
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = implode('',$user->primaryKey());
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user',$primaryValue);
        return true;
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
    public function rootSrcImg() : string
    {
        return str_replace('\\','/',self::$ROOT_DIR);
    }
}