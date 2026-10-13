<div class="login-page">
    <div class="login-card">
        <div class="login-brand-mark">RU</div><h1>Masuk Admin</h1>
        <p class="subtitle">Masuk untuk mengelola semua laporan dan tempat di RuangUlas.</p>
        <?php if ($flash = $flash ?? null): ?><div class="alert alert-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div><?php endif; ?>
        <form method="POST" action="<?= e(url('admin/login')) ?>">
            <div class="form-group"><label class="form-label" for="email">Email</label><input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com" required autofocus></div>
            <div class="form-group"><label class="form-label" for="password">Password</label><input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required></div>
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        </form>
        <p class="login-footnote">Akses khusus administrator</p>
    </div>
</div>
