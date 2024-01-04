<?php 
namespace app\models;
use app\core\db\DbModel;
class UserLangage extends DbModel{
    public int $user;
    public int $langage;
    public int $level;
    public int $exp = 0;
    public function primaryKeyValues() : array
    {
        return [
            'user' => $this->user,
            'langage' => $this->langage,
            'level' => $this->level
            ]??null;
    }
    public function rules() : array
    {
        return [
            'user' => [
                self::RULE_REQUIRED
            ],
            'langage' => [
                self::RULE_REQUIRED
            ],
            'level' => [
                self::RULE_REQUIRED
            ]
        ];
    }
    public function tableName() : string
    {
        return 'practice';
    }
    public function attributes() :array
    {
        return ['user','langage','level','exp'];
    }
    public function primaryKey() : array
    {
        return ['user','langage','level'];
    }
    public function labels() : array
    {
        return [
            'user'=> 'User',
            'langage' => 'Langage',
            'level' => 'Level',
            'exp' => 'Experience'
        ];
    }

    public function findMyLangage($user)
    {
        $table = $this->tableName();
        $sql = "SELECT * FROM $table WHERE user = :user";
        $statement = parent::prepare($sql);
        $statement->bindValue(':user',$user);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }
}