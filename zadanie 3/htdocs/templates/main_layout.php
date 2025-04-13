
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Moja strona' ?></title>

    <!-- Style z szablonu -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/noscript.css">
    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
</head>
<body>

    <!-- Tu może być np. navbar -->

    <!-- Miejsce na dynamiczną zawartość -->
    <main>
        <?php include $content; ?>
    </main>

    <!-- JS z szablonu -->
    <script src="/assets/js/breakpoints.min.js"></script>
    <script src="/assets/js/browser.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.scrollex.min.js"></script>
    <script src="/assets/js/jquery.scrolly.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/util.js"></script>

</body>
</html>