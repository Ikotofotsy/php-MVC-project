<?php 
namespace app\models;
use app\core\db\DbModel;
use app\core\Model;
class Level extends DbModel{
    public int $id;
    public string $level = '';
    public function primaryKeyValues() : array
    {
        return ['id' => $this->id]??null;
    }
    public function rules() : array
    {
        return [];
    }
    public function tableName() : string
    {
        return 'level';
    }
    public function attributes() :array
    {
        return [];
    }
    public function primaryKey() : array
    {
        return ['id'];
    }
    public function labels() : array
    {
        return [
            'level' => 'Level'
        ];
    }
}