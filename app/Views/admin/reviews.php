<div style="display:flex;justify-content:flex-end;gap:.75rem;flex-wrap:wrap;margin-bottom:1rem;">
    <a href="<?= e(url('admin/reviews/print')) ?>" target="_blank" rel="noopener" class="btn btn-outline">Cetak / Simpan PDF</a>
    <form method="POST" action="<?= e(url('admin/reviews/reset')) ?>" onsubmit="return confirm('Reset seluruh data ulasan? Semua ulasan akan dihapus permanen, sedangkan data tempat tetap disimpan.');">
        <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token'] ?? '') ?>">
        <button type="submit" class="btn btn-danger">Reset Data Ulasan</button>
    </form>
</div>
<div class="card" style="padding:0; overflow:hidden;">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Pengulas</th>
                    <th>Tempat</th>
                    <th>Rating</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($reviews)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center;padding:2rem;color:var(--text-muted);">
                            Belum ada ulasan.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($reviews as $r): ?>
                        <tr>
                            <td style="font-weight:600;"><?= e($r['reviewer_name']) ?></td>
                            <td>
                                <a href="<?= e(url('admin/places/' . $r['place_id'])) ?>">
                                    <?= e($r['place_name']) ?>
                                </a>
                            </td>
                            <td><?= starRating((float)$r['rating']) ?></td>
                            <td style="max-width:250px;">
                                <?= e(mb_strimwidth($r['comment'], 0, 80, '...')) ?>
                            </td>
                            <td style="white-space:nowrap;font-size:0.85rem;">
                                <?= date('d M Y H:i', strtotime($r['created_at'])) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
