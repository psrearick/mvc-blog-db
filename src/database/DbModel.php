<?php


namespace app\src\database;


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
    public function save()
    {
        return true;

//        $table = $this->table();
//        $attributes = $this->attributes();
//        $params = array_map(fn($attr) => ":$attr", $attributes);
//        $statement = "INSERT INTO $table (".implode(',', $attributes).") VALUES (".implode(',', $params).")";

        // TODO: prepare pdo statement $statement and bind values to attributes

    }

    /**
     * @param $cond
     * @return mixed
     */
    public function findOne($cond)
    {
        $table = static::table();
        $data = call_user_func([new DemoData, $table]);
        $this->loadData($data);
        return $this;

//        $attrs = array_keys($cond);
//        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attrs));
//        $statement = "SELECT * FROM $table WHERE $SQL";
        // TODO: prepare pdo statement $statement and bind values to attributes
        //  Execute $statement and fetch results
        //  Return first record

    }

}