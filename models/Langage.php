<?php 
namespace app\models;
use app\core\db\DbModel;
use app\core\Model;
class Langage extends DbModel{
    public int $id;
    public string $langage = '';
    public function primaryKeyValues() : array
    {
        return ['id' => $this->id]??null;
    }
    public function rules() : array
    {
        return [
            'langage' => [
                self::RULE_REQUIRED
            ]
        ];
    }
    public function tableName() : string
    {
        return 'langage';
    }
    public function attributes() :array
    {
        return ['langage'];
    }
    public function primaryKey() : array
    {
        return ['id'];
    }
    public function labels() : array
    {
        return [
            'langage' => 'Langage'
        ];
    }
}