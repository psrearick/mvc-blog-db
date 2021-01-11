<?php


namespace app\models;


use app\src\database\DbModel;
use app\src\Model;

class CreatePostForm extends DbModel
{

    public ?int $id = null;
    public string $postTitle = '';
    public string $body = '';
    public string $tags = '';
    public string $imageUrl = '';

    public function rules(): array
    {
        return [
            'postTitle' => [self::RULE_REQ],
            'body' => [self::RULE_REQ],
        ];
    }

    public function labels(): array
    {
        return [
            'postTitle' => 'Title',
            'body' => 'Body',
            'tags' => 'Tags',
            'image_url' => 'Image URL'
        ];
    }

    public function table(): string
    {
        return 'posts';
    }

    public function attributes(): array
    {
        return ['postTitle', 'body', 'tags', 'image_url'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        return true;
    }
}