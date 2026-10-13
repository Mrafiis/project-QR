<section class="home-intro">
    <span class="eyebrow">SELAMAT DATANG DI RUANGULAS</span>
    <h1>Tempat baik selalu punya cerita.</h1>
    <p>Jelajahi rekomendasi di sekitar Anda, baca pengalaman pengunjung, lalu bagikan cerita Anda sendiri.</p>
    <div class="intro-note"><span class="intro-dot"></span> Ulasan nyata dari pengunjung</div>
</section>

<div class="section-heading">
    <div>
        <span class="eyebrow">DIREKOMENDASIKAN</span>
        <h2>Jelajahi tempat</h2>
    </div>
    <span class="section-caption"><?= count($places) ?> tempat tersedia</span>
</div>

<?php if (empty($places)): ?>
    <div class="empty-state">
        <div class="empty-mark">RU</div>
        <h3>Tempat pilihan segera hadir</h3><p>Belum ada tempat yang terdaftar. Silakan kembali lagi nanti.</p>
    </div>
<?php else: ?>
    <div class="place-grid">
        <?php foreach ($places as $place): ?>
            <article class="place-card">
                <?php if (!empty($place['image'])): ?>
                    <img src="<?= e(asset('uploads/' . $place['image'])) ?>" alt="<?= e($place['name']) ?>" class="place-card-img" style="object-fit:cover;">
                <?php else: ?>
                    <div class="place-card-img place-card-placeholder"><span><?= e(mb_strtoupper(mb_substr($place['name'], 0, 1))) ?></span></div>
                <?php endif; ?>
                <div class="place-card-body">
                    <h3 class="place-card-title"><?= e($place['name']) ?></h3>
                    <div class="place-card-meta">
                        <span class="badge badge-secondary"><?= e(ucfirst($place['category'])) ?></span>
                        <?php if ($place['address']): ?><span class="place-address"><?= e(mb_strimwidth($place['address'], 0, 40, '...')) ?></span><?php endif; ?>
                    </div>
                    <div class="place-card-rating">
                        <?= starRating((float)$place['avg_rating']) ?>
                        <span class="rating-number"><?= number_format($place['avg_rating'], 1) ?></span>
                        <span class="review-count"><?= $place['total_reviews'] ?> ulasan</span>
                    </div>
                    <a href="<?= e(url('p/' . $place['barcode_code'])) ?>" class="btn btn-primary btn-sm btn-block">
                        Lihat Ulasan & Nilai
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
