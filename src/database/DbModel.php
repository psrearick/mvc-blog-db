<?php


namespace app\src\database;


use app\models\User;
use app\runtime\DemoData;
use app\src\Application;
use app\src\Model;

abstract class DbModel extends Model
{

    abstract public function table(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    /**
     * @return bool
     */
    public function save(): bool
    {
        $table = $this->table();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare(
            "INSERT INTO $table (" . implode(',', $attributes) . ") 
            VALUES (" . implode(',', $params) . ")"
        );
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();

        return true;
    }

    /**
     * @param array $cond
     * @return array
     */
    public function findAll(array $cond): array
    {
        $table = static::table();
        $data = call_user_func([new DemoData, $table]);
        $matches = [];
        foreach ($data as $record) {
            $match = true;
            foreach ($cond as $field => $val) {
                if (!is_array($val)){
                    if (!array_key_exists($field, $record)){
                        continue;
                    }
                    if ($record[$field] !== $val){
                        $match = false;
                        break;
                    }
                    continue;
                }
                foreach ($val as $key => $value) {
                    if (!array_key_exists($key, $record)){
                        continue;
                    }
                    if (array_key_exists('operator', $cond[0]) && $val['operator'] === 'in') {
                        if (!in_array($value, $record[$key])){
                            $match = false;
                            break;
                        } else {
                            continue;
                        }
                    }
                    if ($record[$key] !== $value){
                        $match = false;
                        break;
                    }
                }
            }
            if ($match) {
                $matches[] = $record;
            }
        }
        return $matches;
    }

    /**
     * @param array $cond
     * @return DbModel
     */
    final public function findOne(array $cond)
    {
        $table = $this->table();
        $attributes  = array_keys($cond);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $table WHERE $sql");
        foreach ($cond as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        $data = $statement->fetchObject();
        if ($data) {
            $this->loadData($data);
        }
        return $this;
    }

    public static function prepare(string $sql): object
    {
        return Application::$app->db->pdo->prepare($sql);
    }

}