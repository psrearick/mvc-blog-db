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