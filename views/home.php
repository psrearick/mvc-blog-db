<?php

use app\src\View;

/**
 * @var $this View
 * @var $posts array
 */

$this->title = "Home";

?>
<h1>Home</h1>

<?php

foreach ($posts as $post) {
    echo "<a href='/post/{$post['slug']}'>{$post['post_title']}</a><br>";
}

?>
