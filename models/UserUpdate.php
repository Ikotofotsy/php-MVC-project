<?php
namespace app\models;
use app\core\DbModel;
use app\core\Model;
use app\core\UserModel;

class UserUpdate extends UserModel{
    public int $id = 0;
    public string $firstname = '';
    public string $lastname = '';
    public string $about = '';
    public function tableName() : string
    {
        return 'user';
    }

    public function attributes() : array
    {
        return ['id','firstname','lastname','about'];
    }
    public function primaryKey() : array
    {
        return ['id'];
    }
    public function setPrimaryKeyValue($pk)
    {
        $this->id = $pk;
    }
    public function primaryKeyValues() : array
    {
        return ['id' => $this->id]??null;
    }
    public function save()
    {
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
            'about' => [
                self::RULE_REQUIRED,
            ]
        ];
    }

    public function labels() : array
    {
        return [
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'about' => 'About You'
        ];
    }
    public function getDisplayName() : string
    {
        return $this->firstname.' '.$this->lastname;
    }
}