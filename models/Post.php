<?php


namespace app\models;


use app\src\database\DbModel;
use app\src\Model;

class Post extends DbModel
{

    public ?int $id = null;
    public string $post_title = '';
    public string $body = '';
    public array $tags = [];
    public string $image_url = '';
    public ?int $user_id = null;
    public string $excerpt = '';
    public string $slug = '';
    public ?int $category_id = null;
    public array $tags_array = [];
    public ?Category $category = null;

    /**
     * @return array[]
     */
    final public function rules(): array
    {
        return [
            'post_title' => [self::RULE_REQ],
            'body' => [self::RULE_REQ],
            'excerpt' => [self::RULE_REQ],
            'user_id' => [self::RULE_REQ],
            'slug' => [self::RULE_REQ, [self::RULE_UNIQUE, 'class' => self::class]]
        ];
    }

    /**
     * @return string[]
     */
    final public function labels(): array
    {
        return [
            'post_title' => 'Title',
            'body' => 'Body',
            'tags' => 'Tags',
            'image_url' => 'Image URL',
            'excerpt' => 'Excerpt',
            'user_id' => 'User',
            'category_id' => 'Category',
            'slug' => 'Slug'
        ];
    }

    /**
     * @return string
     */
    final public function table(): string
    {
        return 'posts';
    }

    /**
     * @return string[]
     */
    final public function attributes(): array
    {
        return ['post_title', 'body', 'tags', 'image_url', 'excerpt', 'user_id', 'category_id', 'slug'];
    }

    /**
     * @return string
     */
    final public function primaryKey(): string
    {
        return 'id';
    }

    /**
     * @return string
     */
    final public function getAuthor(): string
    {
        $user = new User();
        $user->findOne(['id' => $this->user_id]);
        return $user->getDisplayName();
    }

    final public function findAll(array $cond): array
    {
        $matches = parent::findAll($cond);
        $posts = [];
        foreach ($matches as $post) {

            $category = new Category();
            $category->findOne(['id' => $post['category_id']]);

            $postTags = [];
            foreach ($post['tags'] as $tagItem) {
                $tag = new Tag();
                $tag->findOne(['id' => $tagItem]);
                $postTags[] = $tag;
            }

            $post['category'] = $category;
            $post['tags_array'] = $postTags;
            $posts[] = $post;
        }
        return $posts;
    }
}