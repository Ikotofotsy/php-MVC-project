<?php
namespace app\core\form;
use app\core\Model;

class InputField extends Field{
    public function __toString() : string
    {
        $html = '
        <div class="mb-3 %s">
            <label class="form-label">%s</label>
            <input type="%s"  name="%s" value="%s" class="form-control %s">
            <div class="invalid-feedback">
                %s
            </div>
        </div>
    ';
        return sprintf($html,
        ($this->display === self::DISPLAY_NONE)?self::DISPLAY_NONE:'',
        ($this->display === self::DISPLAY_NONE)?'':$this->model->getLabel($this->attribute),
        $this->type,
        $this->attribute,
        $this->model->{$this->attribute},
        $this->model->hasError($this->attribute) ? 'is-invalid ' : '',
        $this->model->getFirstError($this->attribute));
    }
}
?>