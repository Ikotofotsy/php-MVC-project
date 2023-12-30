<?php
namespace app\models;
use app\core\DbModel;
use app\core\Model;
use app\core\UserModel;

class User extends UserModel{
    public int $id;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public function tableName() : string
    {
        return 'user';
    }

    public function attributes() : array
    {
        return ['firstname','lastname','email','password'];
    }
    public function primaryKey() : string
    {
        return 'id';
    }
    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
    public function rules(): array
    {
        return [
            'firstname' => [
                self::RULE_REQUIRED
            ],
            'lastname' => [
                self::RULE_REQUIRED
            ],
            'email' => [
                self::RULE_REQUIRED,
                self::RULE_EMAIL,
                [
                    self::RULE_UNIQUE, 
                    'class' => self::class
                ]
            ],
            'password' => [
                self::RULE_REQUIRED,
                [
                    self::RULE_MIN,
                    'min' => 8
                ],
                [
                    self::RULE_MAX,
                    'max' => 24
                ],
            ],
            'confirmPassword' => [
                self::RULE_REQUIRED,
                [
                    self::RULE_MATCH,
                    'match' => 'password'
                ]
            ]
        ];
    }

    public function labels() : array
    {
        return [
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password',
        ];
    }
    public function getDisplayName() : string
    {
        return $this->firstname.' '.$this->lastname;
    }
}