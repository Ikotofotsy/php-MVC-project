<?php
namespace app\core\form;
use app\core\Model;

class DatalistField extends Field{
    public function __toString()
    {
        $label = '<label for="DataList" class="form-label">%s</label>';
        $input = '<input class="form-control" list="datalistOptions" id="DataList" placeholder="Type to search...">';
        $datalist = [];
        foreach($this->model->selectAll() as $langage)
        {
            $datalist[] = $langage->langage;
        }
        $option = [];
        foreach($datalist as $list)
        {
            $option[] = "<option value=\"$list\">";
        }
        $options = implode('', $option);
        return sprintf('<div class="mb-3">' . $label . $input . '<datalist id="datalistOptions">' . $options  . '</datalist></div>', 
        $this->model->getLabel($this->attribute)
    );
    }
}
?>