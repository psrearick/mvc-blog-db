<?php
use app\src\Application;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $this->title ?></title>
</head>

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
        <?php if (Application::isGuest()): ?>
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>
        <?php else: ?>
            <li><a href="/create-post">Create Post</a></li>
            <a href="/profile">Profile</a>
            <li>Logged in as <?php echo Application::$app->user->getDisplayName() ?>  <a href="/logout">(Logout)</a> </li>
        <?php endif ?>
    </ul>
</div>
</html>
