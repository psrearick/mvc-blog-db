<?php


namespace app\models;


use app\src\DbModel;
use app\src\Model;

class User extends DbModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public ?string $name = null;
    public ?string $email = null;
    public int $status = self::STATUS_INACTIVE;
    public ?string $password = null;
    public ?string $passwordConfirmation = null;

    public function tableName(): string
    {
        return 'users';
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQ],
            'email' => [self::RULE_EMAIL, self::RULE_REQ, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQ, [self::RULE_MIN, 'min' => 6]],
            'passwordConfirmation' => [self::RULE_REQ, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['name', 'email', 'password', 'status'];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'passwordConfirmation' => 'Confirm Password'
        ];
    }
}