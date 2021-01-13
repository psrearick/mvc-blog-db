<?php

use app\src\Application;
use app\src\View;

/**
 * @var $this View
 * @var $posts array
 * @var $type string
 * @var $condition string
 */

$this->title = "Posts";

?>

<div class="page">
    <header class="flex space-between">
        <div>
            <h1>Posts</h1>
        </div>
        <div>
            <?php if(!empty($type)) {
                echo "<h3>" . ucfirst($type) . ": " . $condition . "</h3>";
                if (!Application::isGuest()) {
                    echo "<a href='/edit-$type/$condition'>Edit " . ucfirst($type) . "</a>";
                }
            } ?>
        </div>
    </header>


    <div class="posts-page-posts">

        <?php
        foreach ($posts as $post) {
        ?>
            <article class="posts-post">
                <div>
                    <a href="/post/<?php echo $post['slug'] ?>">
                        <h3 class="title"><?php echo $post['post_title'] ?></h3>
                    </a>
                    <img width="500px" src="<?php echo $post['image_url'] ?>" alt="<?php echo $post['post_title'] ?>">
                    <div>
                        <?php echo nl2br(substr($post['body'], 0, 500)) ?>
                    </div>
                    <div>
                        <a class="btn" href="/post/<?php echo $post['slug'] ?>">
                            <p>Read More</p>
                        </a>
                    </div>
                </div>
            </article>
        <?php
        }
        ?>
    </div>

</div>