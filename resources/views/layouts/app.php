<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NewsBird</title>

    <!-- styles -->
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- google-font -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR|Roboto" rel="stylesheet">
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