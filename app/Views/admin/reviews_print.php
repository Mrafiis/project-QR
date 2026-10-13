<style>
    .review-print-page { max-width:1100px; margin:0 auto; color:#202820; }
    .review-print-heading { display:flex; justify-content:space-between; align-items:flex-start; gap:24px; border-bottom:2px solid #385b43; padding-bottom:16px; margin-bottom:22px; }
    .review-print-heading h1 { margin:0 0 6px; font-size:24px; }
    .review-print-heading p { margin:0; color:#617066; }
    .review-print-meta { text-align:right; color:#617066; font-size:13px; }
    .review-print-page table { width:100%; border-collapse:collapse; font-size:12px; }
    .review-print-page th { background:#edf2eb; text-align:left; color:#304c37; }
    .review-print-page th,.review-print-page td { border:1px solid #d8dfd5; padding:9px 10px; vertical-align:top; }
    .review-print-page tr { break-inside:avoid; }
    .review-print-comment { min-width:220px; white-space:pre-wrap; overflow-wrap:anywhere; }
    .print-actions { display:flex; justify-content:flex-end; margin-bottom:16px; }
    @media print {
        @page { size:A4 landscape; margin:12mm; }
        body { background:#fff!important; color:#202820!important; }
        .sidebar,.admin-header,.print-actions,.footer { display:none!important; }
        .admin-layout,.admin-content,.admin-body { display:block!important; margin:0!important; padding:0!important; width:auto!important; max-width:none!important; }
        .review-print-page { max-width:none; }
        .review-print-page th { print-color-adjust:exact; -webkit-print-color-adjust:exact; }
        a { color:inherit; text-decoration:none; }
    }
</style>
<div class="review-print-page">
    <div class="print-actions"><button type="button" class="btn btn-primary" onclick="window.print()">Cetak / Simpan sebagai PDF</button></div>
    <header class="review-print-heading">
        <div><h1>Laporan Ulasan RuangUlas</h1><p><?= count($reviews) ?> ulasan</p></div>
        <div class="review-print-meta">Dicetak pada<br><strong><?= e($printedAt) ?></strong></div>
    </header>
    <table>
        <thead><tr><th style="width:34px;">No.</th><th>Pengulas</th><th>Tempat</th><th style="width:70px;">Rating</th><th>Komentar</th><th style="width:125px;">Tanggal</th></tr></thead>
        <tbody>
            <?php if (empty($reviews)): ?>
                <tr><td colspan="6" style="text-align:center;">Belum ada ulasan.</td></tr>
            <?php else: ?>
                <?php foreach ($reviews as $index => $review): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= e($review['reviewer_name']) ?></td>
                        <td><?= e($review['place_name']) ?></td>
                        <td><?= (int) $review['rating'] ?>/5</td>
                        <td class="review-print-comment"><?= e($review['comment']) ?></td>
                        <td><?= e(date('d-m-Y H:i', strtotime($review['created_at']))) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
