<?php


namespace app\src;


use app\src\database\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}