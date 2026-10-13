<div class="login-page">
    <div class="login-card">
        <div class="login-brand-mark">RU</div><h1>Buat Akun Admin</h1>
        <p class="subtitle">Daftarkan akun admin pertama untuk mulai mengelola seluruh laporan.</p>
        <?php if ($flash = $flash ?? null): ?><div class="alert alert-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div><?php endif; ?>
        <form method="POST" action="<?= e(url('admin/register')) ?>">
            <div class="form-group"><label class="form-label" for="name">Nama</label><input type="text" id="name" name="name" class="form-control" placeholder="Nama administrator" required autofocus></div>
            <div class="form-group"><label class="form-label" for="email">Email</label><input type="email" id="email" name="email" class="form-control" placeholder="nama@email.com" required></div>
            <div class="form-group"><label class="form-label" for="password">Password</label><input type="password" id="password" name="password" class="form-control" minlength="8" placeholder="Minimal 8 karakter" required></div>
            <div class="form-group"><label class="form-label" for="password_confirmation">Konfirmasi Password</label><input type="password" id="password_confirmation" name="password_confirmation" class="form-control" minlength="8" placeholder="Ulangi password" required></div>
            <button type="submit" class="btn btn-primary btn-block">Daftar dan Buat Akun</button>
        </form>
    </div>
</div>
