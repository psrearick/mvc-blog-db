<?php


namespace app\src\exception;


class ForbiddenException extends \Exception
{
    protected $message = "You do not have permission to access this page";
    protected $code = 403;
}