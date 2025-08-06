<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'GPduMonde - Gestion Cargaison' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="/public/assets/css/style.css" rel="stylesheet">
</head>
<body class="<?= $bodyClass ?? 'bg-gray-100' ?>">
    <?= $content ?? '' ?>
    
    <script src="/public/assets/js/app.js"></script>
    <?= $scripts ?? '' ?>
</body>
</html>