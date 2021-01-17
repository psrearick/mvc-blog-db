<?php


namespace app\models;


class Tag extends \app\src\database\DbModel
{
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
     * @inheritDoc
     */
    final public function rules(): array
    {
        return [
            'tagName' => [self::RULE_REQ, [self::RULE_UNIQUE, 'class' => self::class]],
        ];
    }

    /**
     * @return string[]
     */
    final public function labels(): array
    {
        return [
            'tagName' => 'Tag'
        ];
    }
}