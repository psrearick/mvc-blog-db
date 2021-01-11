<?php

/** @var $this \app\src\View */
$this->title = "Home";

?>
<h1>Posts</h1>

<?php

foreach ($posts as $post) {
    echo $post . "<br>";
}

?>
