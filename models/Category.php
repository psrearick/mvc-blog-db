<?php


namespace app\models;


use app\src\database\DbModel;

class Category extends DbModel
{
    public string $category = '';
    public ?int $id = null;

    /**
     * @return string
     */
    final public function table(): string
    {
        return 'category';
    }

    /**
     * @return string[]
     */
    final public function attributes(): array
    {
        return ['category'];
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
            'category' => [self::RULE_REQ, [self::RULE_UNIQUE, 'class' => self::class]],
        ];
    }
}