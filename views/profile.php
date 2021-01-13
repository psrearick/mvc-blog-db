<?php

/** @var $model Post */
/** @var $this \app\src\View */
$this->title = 'Profile';

?>

<div class="page">
    <header>
        <h1>Profile</h1>
    </header>

    <div>
        <?php echo $model->name ?>
    </div>

    <div>
        <?php echo $model->email ?>
    </div>
</div>

