<?php


namespace app\models;


use app\src\database\DbModel;

class Tag extends DbModel
{
    public string $tagName = '';

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
        return ['tag-name'];
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
            'tag-name' => [self::RULE_REQ],
        ];
    }
}