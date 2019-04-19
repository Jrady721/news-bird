<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NewsBird</title>

    <!-- styles -->
    <link rel="stylesheet" href="<?= asset('css/app.css'); ?>">

    <!-- scripts -->
    <script src="<?= asset('js/jquery-3.4.0.js'); ?>" defer></script>
</head>
<body>
<div id="app">
    <?php include_once 'partials/header.php'; ?>
    <main>
        <?php if (isset($template)): ?>
            <?php include_once __DIR__ . "/../{$template}.php"; ?>
        <?php else: ?>
            <?php include_once __DIR__ . "/../errors/404.php"; ?>
        <?php endif; ?>
    </main>
    <?php include_once 'partials/footer.php'; ?>
</div>
</body>
</html>