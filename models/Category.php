<?php


namespace app\models;


class Category extends \app\src\database\DbModel
{
    public string $category = '';
    public ?int $id = null;

    /**
     * @return string
     */
    final public function table(): string
    {
        return 'categories';
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
     * @inheritDoc
     */
    final public function rules(): array
    {
        return [
            'category' => [self::RULE_REQ, [self::RULE_UNIQUE, 'class' => self::class]],
        ];
    }

    final public function labels(): array
    {
        return [
            'category' => 'Category'
        ];
    }
}