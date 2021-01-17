<?php

/** @var $model Post */
/** @var $this View */

use app\models\Post;
use core\Application;
use core\View;

$this->title = $model->post_title;

?>

<div class="page post-page">

    <header>
        <h1><?php echo $model->post_title ?></h1>
    </header>

    <div class="hero">
        <img src="<?php echo $model->image_url ?>"  alt="<?php echo $model->post_title ?>"/>
    </div>

    <div class="flex post">

        <div class="post-body">
            <?php echo nl2br($model->body) ?>
            <div class="edit-post">
                <?php if ($model->user_id === Application::$app->user->id) { ?>
                    <a href="/edit-post/<?php echo $model->slug ?>">Edit Post</a>
                <?php } ?>
            </div>
        </div>

        <aside class="post-details flex-right flex">
            <div>
                <b>Author</b>
                <br>
                <span>
                    <?php echo $model->getAuthor() ?>
                </span>
            </div>

            <div>
                <b>Category</b>
                <br>
                <span>
                    <a href="/posts/category/<?php echo $model->category->category ?>"><?php echo $model->category->category ?></a>
                </span>
            </div>

            <div>
                <b>Tags</b>
                <br>
                <span>
                    <?php
                    foreach ($model->tags_array as $tag) {
                        ?>
                        <a href="/posts/tag/<?php echo $tag->tagName ?>"><?php echo $tag->tagName ?></a><br>
                        <?php
                    }
                    ?>
                </span>
            </div>
        </aside>
    </div>
</div>