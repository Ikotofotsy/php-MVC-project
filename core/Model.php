<?php
namespace app\core;

abstract class Model{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public function loadData($data)
    {
        foreach($data as $key=>$value)
        {
            if(property_exists($this, $key))
            {
                $this->{$key} = $value;
            }
        }
    }
    abstract public function rules() : array;
    public array $errors = [];
    public function validate()
    {
        foreach($this->rules() as $attribute => $rules)
        {
            $value = $this->{$attribute};
            foreach($rules as $rule)
            {
                $ruleName = $rule;
                if(!is_string($ruleName))
                {
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value)
                {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
            }
        }

        return empty($this->errors);
    }

    public function addError(string $attribute, string $rule)
    {
        $message = $this->errorMessage() ?? '';
        $this->errors[$attribute][] = $message;
    }

    public function errorMessage()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'Must valide adress',
            self::RULE_MIN => 'Min lenght {min}',
            self::RULE_MAX => 'Max lenght {max}',
            self::RULE_MATCH => 'Must same as {mutch}'
        ];
    }
}