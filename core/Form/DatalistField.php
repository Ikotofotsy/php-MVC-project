<?php
namespace app\core\form;
use app\core\Model;

class DatalistField extends Field{
    public function __toString()
    {
        $label = '<label for="DataList" class="form-label">%s</label>';
        $input = '<input name="%s" class="form-control" list="Data" id="DataList" placeholder="Type to search...">';
        $datalist = [];
        foreach($this->model->selectAll() as $values)
        {
            $datalist[$values->id] = $values->{$this->attribute};
        }
        
        $option = [];
        foreach($datalist as $key=>$list)
        {
            $option[] = "<option value=\"$key\">$list";
        }
        $options = implode('', $option);
        return sprintf('<div class="mb-3">' . $label . $input . '<datalist id="Data">' . $options  . '</datalist></div>', 
        $this->attribute,
        $this->attribute,
        $this->model->getLabel($this->attribute),
        $this->attribute
    );
    }
}
?>