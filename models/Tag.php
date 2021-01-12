<?php


namespace app\models;


use app\src\database\DbModel;

class Tag extends DbModel
{
    public string $tagName = '';
    public ?int $id = null;

    /**
     * @return string
     */
    final public function table(): string
    {
        return 'tags';
    }

    /**
     * @return string[]
     */
    final public function attributes(): array
    {
        return ['tagName'];
    }

    /**
     * @return string
     */
    final public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * @return array[]
     */
    final public function rules(): array
    {
        return [
            'tagName' => [self::RULE_REQ, [self::RULE_UNIQUE, 'class' => self::class]],
        ];
    }
}