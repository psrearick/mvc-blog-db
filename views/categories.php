<?php

/** @var $categories array */
/** @var $this View */

use app\models\Category;
use core\Application;
use core\View;

$this->title = 'Categories';

?>

<div class="page">
    <header>
        <div>
            <h1>All Categories</h1>
        </div>
    </header>

    <div class="inner-page">
        <div>
            <?php
            foreach ($categories as $category) {
                ?>
                <span><a href="/posts/category/<?php echo $category['category'] ?>"><?php echo $category['category'] ?></a></span><br>
                <?php
            }
            ?>
        </div>
        <div class="mt-20">
            <?php
            if (!Application::isGuest()) {
                echo "<div><a href='/create-category'>Create Category</a></div>";
            }
            ?>
        </div>
    </div>

</div>