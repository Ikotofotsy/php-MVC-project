<?php
namespace app\core;

class Request{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI']??'/';
        $position = strpos($path, '?');

        if($position === false)
        {
            return $path;
        }
        return substr($path, 0, $position);
    }
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];
        if($this->method()==='get')
        {
            foreach($_GET as $key=>$value)
            {
                $body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->method()==='post')
        {
            foreach($_POST as $key=>$value)
            {
                $body[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if(!empty($_FILES['picture']['name']))
            {
                $lastKey = array_key_last($body);
                $lastValue = $body[$lastKey];
                array_pop($body);
                $body['picture'] = $this->getPictureName();
                $body[$lastKey] =$lastValue;
            }
        }

        return $body;
    }
    public function getPictureName() : string
    {
        if ($_FILES["picture"]["error"] === 0) 
        {
            $targetDirectory = Application::$app::$ROOT_DIR."/images/"; 
            $imageFileName = $_FILES["picture"]["name"];
            $targetPath = $targetDirectory . $imageFileName;
            return (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetPath))?$imageFileName:'defaul_picture';
        }
    }
    public function getActionButton()
    {
        return ($this->method() === 'post')?array_key_last($_POST):false;

    }
}