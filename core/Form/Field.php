<?php
namespace app\core\form;

use app\core\db\DbModel;
use app\core\Model;

abstract class Field{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public const TYPE_FILE = 'file';
    public const TYPE_HIDDEN = 'hidden';
    public const DISPLAY_NONE = 'd-none';

    public string $type;
    public string $display = '';
    public Model|DbModel $model;
    public string $attribute;

    public function __construct(Model|DbModel $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function __toString() :  string;

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;

        return $this;
    }
    public function fileField()
    {
        $this->type = self::TYPE_FILE;

        return $this;
    }
    public function displayNone()
    {
        $this->display = self::DISPLAY_NONE;

        return $this;
    }

}
?>