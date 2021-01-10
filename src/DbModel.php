<?php


namespace app\src;


abstract class DbModel extends Model
{

    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = "INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).")";

        // prepare pdo statement and bind values to attributes

        return $this;


    }

}