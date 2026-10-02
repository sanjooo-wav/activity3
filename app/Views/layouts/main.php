<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Counter POS') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>">Counter POS</a>
            <nav aria-label="Main navigation">
                <a href="<?= site_url('/') ?>">Home</a>
                <a href="<?= site_url('about') ?>">About</a>
                <a href="<?= site_url('customers') ?>">Customers</a>
                <a href="<?= site_url('users') ?>">Users</a>
            </nav>
        </div>
    </header>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <footer>Counter POS, starter account directory</footer>
</body>
</html>
