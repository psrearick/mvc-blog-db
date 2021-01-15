<?php


namespace app\models;


use app\src\Model;
use app\src\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public ?int $id = null;
    public ?string $firstname = null;
    public ?string $lastname = null;
    public ?string $email = null;
    public int $status = self::STATUS_INACTIVE;
    public ?string $password = null;
    public ?string $passwordConfirmation = null;

    /**
     * @return string
     */
    final public function table(): string
    {
        return 'users';
    }

    /**
     * @return string
     */
    final public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * @return bool
     */
    final public function save(): bool
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    /**
     * @return array[]
     */
    final public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQ],
            'lastname' => [self::RULE_REQ],
            'email' => [self::RULE_EMAIL, self::RULE_REQ, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQ, [self::RULE_MIN, 'min' => 6]],
            'passwordConfirmation' => [self::RULE_REQ, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    /**
     * @return string[]
     */
    final public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'status'];
    }

    /**
     * @return string[]
     */
    final public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'passwordConfirmation' => 'Confirm Password'
        ];
    }

    /**
     * @return string
     */
    final public function getDisplayName(): string
    {
        return $this->firstname;
    }
}