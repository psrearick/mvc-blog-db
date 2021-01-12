<?php


namespace app\models;


use app\src\database\DbModel;
use app\src\Model;

class Post extends DbModel
{

    public ?int $id = null;
    public string $post_title = '';
    public string $body = '';
    public string $tags = '';
    public string $image_url = '';
    public ?int $user_id = null;
    public string $excerpt = '';
    public ?int $category_id = null;

    public function rules(): array
    {
        return [
            'post_title' => [self::RULE_REQ],
            'body' => [self::RULE_REQ],
            'excerpt' => [self::RULE_REQ],
            'user_id' => [self::RULE_REQ],
        ];
    }

    public function labels(): array
    {
        return [
            'post_title' => 'Title',
            'body' => 'Body',
            'tags' => 'Tags',
            'image_url' => 'Image URL',
            'excerpt' => 'Excerpt',
            'user_id' => 'User',
            'category_id' => 'Category'
        ];
    }

    public function table(): string
    {
        return 'posts';
    }

    public function attributes(): array
    {
        return ['post_title', 'body', 'tags', 'image_url', 'excerpt', 'user_id', 'category_id'];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getAuthor(): string
    {
        $user = new User();
        $user->findOne(['id' => $this->user_id]);
        return $user->getDisplayName();
    }

    public function save()
    {
        return true;
    }
}