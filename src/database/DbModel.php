<?php


namespace app\src\database;


use app\models\User;
use app\runtime\DemoData;
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
        $record = $this->findOne([]);
        $this->loadData($record);
        return true;

//        $table = $this->table();
//        $attributes = $this->attributes();
//        $params = array_map(fn($attr) => ":$attr", $attributes);
//        $statement = "INSERT INTO $table (".implode(',', $attributes).") VALUES (".implode(',', $params).")";

        // TODO: prepare pdo statement $statement and bind values to attributes

    }

    /**
     * @param array $cond
     * @return array
     */
    final public function findAll(array $cond): array
    {
        $table = static::table();
        $data = call_user_func([new DemoData, $table]);
        $matches = [];
        foreach ($data as $record) {
            $match = true;
            foreach ($cond as $field => $val) {
                if ($record[$field] !== $val){
                    $match = false;
                    break;
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
    final public function findOne(array $cond): DbModel
    {
        $matches = $this->findAll($cond);
        if (count($matches) > 0) {
            $this->loadData($matches[0]);
        }

        return $this;

//        $attrs = array_keys($cond);
//        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attrs));
//        $statement = "SELECT * FROM $table WHERE $SQL";
        // TODO: prepare pdo statement $statement and bind values to attributes
        //  Execute $statement and fetch results
        //  Return first record

    }

}