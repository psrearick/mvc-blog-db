<?php

use app\src\Application;

$this->title = 'Tags';
/** @var $tags array */
?>

<div class="page">
    <header>
        <div>
            <h1>All Tags</h1>
        </div>
    </header>

    <div class="inner-page">
        <div>
            <?php
            foreach ($tags as $tag) {
            ?>
                <span><a href="/posts/tag/<?php echo $tag['tagName'] ?>"><?php echo $tag['tagName'] ?></a></span><br>
            <?php
            }
            ?>
        </div>
        <div class="mt-20">
            <?php
            if (!Application::isGuest()) {
                echo "<div><a href='/create-tag'>Create Tag</a></div>";
            }
            ?>
        </div>
    </div>
</div>
