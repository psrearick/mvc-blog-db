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
        <?php echo $model->category_id ?>
    </span>
</div>


<div>
    <?php echo nl2br($model->body) ?>
</div>

<div>
    <span>
        tags: <?php echo $model->tags ?>
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
