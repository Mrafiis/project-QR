<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'RuangUlas') ?> | RuangUlas</title>
    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>?v=<?= filemtime(__DIR__ . '/../../../public/css/style.css') ?>">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="<?= e(url()) ?>" class="navbar-brand"><span class="public-brand-mark">RU</span><span class="navbar-brand-copy">RuangUlas<small>Jelajahi. Nilai. Bagikan.</small></span>
            </a>
            <ul class="navbar-nav">
                <li><a href="<?= e(url()) ?>">Beranda</a></li>
                <?php if (!isset($place)): ?>
                    <li><a class="nav-admin-link" href="<?= e(url('admin/login')) ?>">Masuk Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    
    <main class="container">
        <?php if ($flash = $flash ?? null): ?>
            <div class="alert alert-<?= e($flash['type']) ?>">
                <?= e($flash['message']) ?>
            </div>
        <?php endif; ?>
