<?php
/** @var $model Post */
/** @var $this \app\src\View */

use app\models\Post;
use app\src\Application;

$this->title = $model->post_title;

?>
<h1><?php echo $model->post_title ?></h1>
<img src="<?php echo $model->image_url ?>"  alt="<?php echo $model->post_title ?>"/>

<div>
    <span>
        <a href="/posts/category/<?php echo $model->category->category ?>"><?php echo $model->category->category ?></a>

    </span>
</div>


<div>
    <?php echo nl2br($model->body) ?>
</div>

<div>
    <span>
        tags:
        <br>
        <?php
            foreach ($model->tags_array as $tag) {
                ?>
                    <a href="/posts/tag/<?php echo $tag->tagName ?>"><?php echo $tag->tagName ?></a><br>
                <?php
            }
        ?>
    </span>
</div>

<div>
    <span>
        by: <?php echo $model->getAuthor() ?>
    </span>
</div>

<div>
    <?php if ($model->user_id === Application::$app->user->id) { ?>
        <a href="/edit-post/<?php echo $model->slug ?>">Edit Post</a>
    <?php } ?>
</div>
