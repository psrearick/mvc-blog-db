<?php
use app\src\Application;
?>

<div>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/create-post">Create Post</a></li>
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>
    </ul>
</div>


<div>
    <div>
        <?php if (Application::$app->session->getMessage('success')): ?>
            <div>
               <?php echo Application::$app->session->getMessage('success') ?>
            </div>
        <?php endif; ?>
    </div>
    {{content}}
</div>

