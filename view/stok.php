<?php
$active = 'stok';
require_once __DIR__ . '/partials/header.php';
?>

<div class="container">
<?php require_once __DIR__ . '/partials/sidebar.php'; ?>

<main class="content">
    <h1 class="page-title">Stok</h1>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th style="width:60px;">No</th>
                    <th>Produk</th>
                    <th style="width:150px;">Jumlah Stok</th>
                    <th style="width:120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($stok)): ?>
                <?php $no = 1; foreach ($stok as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                    <td><?= $row['jumlah_stok'] ?></td>
                    <td class="aksi">
                        <button class="btn-aksi delete"
                            onclick="confirmDelete('<?= $row['id_stok'] ?>')">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="empty">Data stok kosong</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
</div>

<form method="post" id="formDelete" style="display:none;">
    <input type="hidden" name="hapus_id" id="hapus_id">
</form>

<script>
function confirmDelete(id) {
    if (confirm('Hapus data stok ini?')) {
        document.getElementById('hapus_id').value = id;
        document.getElementById('formDelete').submit();
    }
}
</script>
