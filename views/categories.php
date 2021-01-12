<?php

/** @var $categories array */
/** @var $this \app\src\View */

use app\models\Category;
use app\src\Application;

$this->title = 'Categories';

?>

<h3>All Categories</h3>

<div>
    <ul>
        <?php
            foreach ($categories as $category) {
        ?>
                <li><a href="/posts/category/<?php echo $category['category'] ?>"><?php echo $category['category'] ?></a></li>
        <?php
            }
        ?>
    </ul>
</div>

<div>
    <a href="/create-category">Create Category</a>
</div>
