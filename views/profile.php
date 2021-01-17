<?php

/** @var $model Post */
/** @var $this View */

use app\models\Post;
use core\View;

$this->title = 'Profile';

?>

<div class="page">
    <header>
        <h1>Profile</h1>
    </header>

    <div>
        <?php echo $model->firstname ?>
    </div>

    <div>
        <?php echo $model->lastname ?>
    </div>

    <div>
        <?php echo $model->email ?>
    </div>
</div>

