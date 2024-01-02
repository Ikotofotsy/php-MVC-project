<?php
namespace app\core\form;
use app\core\Model;

class InputField extends Field{
    public function __toString() : string
    {
        return sprintf('
            <div class="mb-3">
                <label class="form-label">%s</label>
                <input type="%s"  name="%s" value="%s" class="form-control%s">
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
            
        ',
        $this->model->getLabel($this->attribute),
        $this->type,
        $this->attribute,
        $this->model->{$this->attribute},
        $this->model->hasError($this->attribute) ? ' is-invalid ' : '',
        $this->model->getFirstError($this->attribute));
    }
}
?>