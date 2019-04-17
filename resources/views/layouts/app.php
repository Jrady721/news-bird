<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEWS BIRD</title>


    <!-- styles -->
    <link rel="stylesheet" href="<?= $lib->asset('css/app.css'); ?>">

    <!-- scripts -->
</head>
<body>
<div id="app">
    <?php require_once VIEWS_DIR . '/layouts/partials/header.php'; ?>


    <?php require_once VIEWS_DIR . $view; ?>


    <?php require_once VIEWS_DIR . '/layouts/partials/footer.php'; ?>
</div>
</body>
</html>
<?php


