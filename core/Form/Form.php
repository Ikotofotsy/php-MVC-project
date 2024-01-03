<?php
namespace app\core\form;
use app\core\Model;

class Form{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s" enctype="multipart/form-data">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function inputField(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }
    public function datalistField(?Model $model, $attribute)
    {
        return new DatalistField($model, $attribute);
    }
    public function textarea(Model $model, $attribute)
    {
        return new Textarea($model, $attribute);
    }
}
?>