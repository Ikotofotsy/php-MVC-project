<?php
namespace app\core\db;
use app\core\Application;
use app\core\Model;
abstract class DbModel extends Model{
    abstract public function tableName() : string;
    abstract public function attributes() : array;
    abstract public function primaryKey() : array;
    abstract public function primaryKeyValues() : array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $sql = "INSERT INTO $tableName (". implode(',',$attributes) .") VALUES(
            " . implode(',',$params) . "
        )";
        $statement = self::prepare($sql);
        foreach($attributes as $attribute)
        {
            $statement->bindValue(":$attribute",$this->{$attribute});
        }
        $statement->execute();

        return true;
    }
    public function update($pk)
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $primaryKeys = $this->primaryKey();
        $primaryKeys = implode('AND ',array_map(fn($id) => "$id = :$id", $primaryKeys));
        $columns = [];
        $values = [];
        foreach($attributes as $attribute)
        {
            if(!empty($this->{$attribute}))
            {
                $values[$attribute] = $this->{$attribute};
                $columns[] = $attribute . ' = ' . ':'. $attribute;
            }
        }
        $columns = implode(',',$columns);
        $sql = "UPDATE $tableName SET $columns WHERE $primaryKeys";
        
        $statement = self::prepare($sql);
        foreach($values as $column=>$value)
        {
            $statement->bindValue(":$column",$value);
        }
        foreach($pk as $id=>$value)
        {
            $statement->bindValue(":$id",$value);
        }
        
        return true;
    }
    public function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $sql = "SELECT * FROM $tableName WHERE $sql";
        $statement = self::prepare($sql);
        foreach($where as $key => $item)
        {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public function selectAll()
    {
        $tableName = static::tableName();
        $sql = "SELECT * FROM $tableName";
        $statement = self::prepare($sql);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }
    protected static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
?>