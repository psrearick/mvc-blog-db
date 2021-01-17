<?php
use core\Application;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="../../public/js/main.js"></script>

    <title><?php echo $this->title ?></title>
</head>

<body>
<!--<div class="container">-->

    <header class="navbar flex">

        <div class="site-title navbar-link navbar-logo">
            <a href="/" >
                <?php echo Application::$app->config['site_name'] ?>
            </a>
        </div>

        <div class="nav">
            <div class="navbar-links">
                <a href="/">Home</a>
            </div>
        </div>

    </header>
<!--</div>-->

<div class="main-content">
        <?php if (Application::$app->session->getMessage('success')): ?>
            <div class="status-message">
                <span><?php echo Application::$app->session->getMessage('success') ?></span>
            </div>
        <?php endif; ?>

    <div>
        {{content}}
    </div>

    <div class="nav flex bottom-bar">
        <a href="/">Home</a>
        <?php if (Application::isGuest()): ?>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
        <?php else: ?>
            <a href="/profile">Profile</a>
            Logged in as <?php echo Application::$app->user->getDisplayName() ?>  <a href="/logout">(Logout)</a>
        <?php endif ?>
    </div>
</div>
</body>
</html>
