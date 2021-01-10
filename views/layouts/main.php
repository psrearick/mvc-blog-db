<?php
use app\src\Application;
?>

<div>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/create-post">Create Post</a></li>
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

<div>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/create-post">Create Post</a></li>
        <?php if (Application::isGuest()): ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>
        <?php else: ?>
            <a href="/profile">Profile</a>
            <li>Logged in as <?php echo Application::$app->user->getDisplayName() ?>  <a href="/logout">(Logout)</a> </li>
        <?php endif ?>
    </ul>
</div>
