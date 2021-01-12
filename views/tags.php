<?php

$this->title = 'Tags';
/** @var $tags array */
?>

<h1>All Tags</h1>

<div>
    <ul>
        <?php
            foreach ($tags as $tag) {
        ?>
                <li><a href="/posts/tag/<?php echo $tag['tagName'] ?>"><?php echo $tag['tagName'] ?></a></li>
        <?php
            }
        ?>
    </ul>
</div>
<div>
    <a href="/create-tag">Create Tag</a>
</div>
