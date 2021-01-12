<?php

use app\src\View;

/**
 * @var $this View
 * @var $posts array
 * @var $tags array
 * @var $categories array
 */

$this->title = "Home";

?>




<div class="home">

    <div class="nav">
        <div class="navbar-links">
            <?php
            foreach ($categories as $category) {
                echo "<a href='/posts/category/{$category['value']}'>{$category['value']}</a>";
            }
            ?>
        </div>
    </div>

    <div class="hero" style="background-image: url('<?php echo $posts[0]['image_url'] ?>')">
        <div class="hero-text">
            <div>
                <h1>Featured Story</h1>
                <h2><?php echo $posts[0]['post_title'] ?></h2>
            </div>
<!--            <div>-->
                <a class="read-more btn" href="/post/<?php echo $posts[0]['slug'] ?>">Read Story</a>
<!--            </div>-->
        </div>
    </div>

    <div class="flex">
        <div class="blog">

            <?php
                $homePosts = array_slice($posts, 1, 2);
                foreach ($homePosts as $homePost) {
                    ?>

                    <article class="homePost">
                        <a href="/post/<?php echo $homePost['slug'] ?>">
                            <h3 class="title"><?php echo $homePost['post_title'] ?></h3>
                        </a>
                        <img width="500px" src="<?php echo $homePost['image_url'] ?>" alt="<?php echo $homePost['post_title'] ?>">
                        <div>
                            <?php echo nl2br(substr($homePost['body'], 0, 1500)) ?>
                        </div>
                    </article>

            <?php
                }
            ?>

        </div>
        <div class="flex-right">
            <aside class="recent-posts">
                <h3>Recent Posts</h3>
                <?php
                    foreach ($posts as $post) {
                        echo "<a href='/post/{$post['slug']}'>{$post['post_title']}</a><br>";
                    }
                ?>
            </aside>
            <div class="tag-cloud">
                <h3>Tags</h3>
                <?php
                    foreach ($tags as $tag) {
                        echo "<span class='tag-cloud-tag'>
                                <a href='/posts/tag/{$tag['value']}'>{$tag['value']}</a>
                            </span>";
                    }
                ?>
            </div>
        </div>
    </div>

</div>