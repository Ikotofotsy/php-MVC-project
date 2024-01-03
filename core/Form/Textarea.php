<?php
namespace app\core\form;
use app\core\Model;

class Textarea extends Field{
    public function __toString() : string
    {
        return sprintf('
            <div class="mb-3">
                <div class="form-floating">
                    <textarea class="form-control%s" name="%s" id="floatingTextarea2" style="height: 100px">%s</textarea>
                    <label for="floatingTextarea2">%s</label>
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>
                
            </div>
            
        ',
        $this->model->hasError($this->attribute) ? ' is-invalid ' : '',
        $this->attribute,
        $this->model->{$this->attribute},
        $this->model->getLabel($this->attribute),
        $this->model->getFirstError($this->attribute));
    }
}
?>