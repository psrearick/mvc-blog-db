<?php


namespace app\src;


abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}