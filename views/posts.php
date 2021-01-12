<?php

use app\src\View;

/**
 * @var $this View
 * @var $posts array
 * @var $type string
 * @var $condition string
 */

$this->title = "Posts";

?>
<h1>Posts</h1>


<?php if (!empty($type)) { ?>
<h3><?php echo ucfirst($type) ?>: <?php echo $condition ?></h3>
    <a href="/edit-<?php echo $type?>/<?php echo $condition ?>">Edit <?php echo $type ?></a><br>
<?php } ?>
<?php

foreach ($posts as $post) {
    echo "<a href='/post/{$post['slug']}'>{$post['post_title']}</a><br>";
}

?>
