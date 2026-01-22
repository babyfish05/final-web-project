<?php
$active = 'stok';
require_once __DIR__ . '/partials/header.php';
?>

<div class="container">
<?php require_once __DIR__ . '/partials/sidebar.php'; ?>

<main class="content">
    <h1 class="page-title">Stok</h1>

    <div class="date-card">
        <span class="date">Date: <?= date('d/m/Y') ?></span>
        <span class="day"><?= date('l') ?></span>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <button class="btn-tambah" onclick="openTambah()">
            <span class="icon">+</span>
            <span class="text">Tambah Stok</span>
        </button>

        <div class="search-box">
            <input type="search" placeholder="Search..." id="searchInput" onkeyup="searchTable()">
            <span class="search-icon">🔍</span>
        </div>
    </div>

    <!-- Tabel Stok -->
<!-- Tabel Stok -->
<table class="table" id="stokTable">
    <thead>
        <tr>
            <th style="width:80px;">No</th>
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
                <button class="btn-aksi edit"
                    onclick="openEdit(
                        '<?= $row['id_stok'] ?>',
                        '<?= $row['id_produk'] ?>',
                        '<?= htmlspecialchars($row['nama_produk'], ENT_QUOTES) ?>',
                        '<?= $row['jumlah_stok'] ?>'
                    )">
                    <i class="fa-regular fa-pen-to-square"></i>
                </button>

                <button class="btn-aksi delete"
                    onclick="confirmDelete(
                        '<?= $row['id_stok'] ?>',
                        '<?= htmlspecialchars($row['nama_produk'], ENT_QUOTES) ?>'
                    )">
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

</main>
</div>

<!-- FORM HIDDEN -->
<form method="post" id="formStok" style="display:none;">
    <input type="hidden" name="id_stok" id="id_stok">
    <input type="hidden" name="id_produk" id="id_produk">
    <input type="hidden" name="jumlah_stok" id="jumlah_stok">
</form>

<form method="post" id="formDelete" style="display:none;">
    <input type="hidden" name="hapus_id" id="hapus_id">
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
/* ================= TAMBAH STOK ================= */
function openTambah() {
    Swal.fire({
        title: 'Tambah Stok',
        html: `
            <select id="sw_produk" class="swal2-select">
                <option value="">-- Pilih Produk --</option>
                <?php foreach ($produk as $p): ?>
                <option value="<?= $p['id_produk'] ?>"><?= htmlspecialchars($p['nama_produk']) ?></option>
                <?php endforeach; ?>
            </select>
            <input id="sw_jumlah" type="number" min="1" class="swal2-input" placeholder="Jumlah Stok">
        `,
        confirmButtonText: 'Simpan',
        showCancelButton: true,
        preConfirm: () => {
            if (!sw_produk.value || !sw_jumlah.value) {
                Swal.showValidationMessage('Semua field wajib diisi');
            }
        }
    }).then(result => {
        if (result.isConfirmed) {
            id_stok.value = '';
            id_produk.value = sw_produk.value;
            jumlah_stok.value = sw_jumlah.value;
            formStok.submit();
        }
    });
}

/* ================= EDIT STOK ================= */
function openEdit(id_stok_val, id_produk_val, nama_produk, jumlah_val) {
    Swal.fire({
        title: `Edit Stok: ${nama_produk}`,
        html: `
            <select id="sw_produk" class="swal2-select">
                <?php foreach ($produk as $p): ?>
                <option value="<?= $p['id_produk'] ?>"><?= htmlspecialchars($p['nama_produk']) ?></option>
                <?php endforeach; ?>
            </select>
            <input id="sw_jumlah" type="number" min="0" class="swal2-input" value="${jumlah_val}">
        `,
        didOpen: () => {
            sw_produk.value = id_produk_val;
        },
        confirmButtonText: 'Update',
        showCancelButton: true
    }).then(result => {
        if (result.isConfirmed) {
            id_stok.value = id_stok_val;
            id_produk.value = sw_produk.value;
            jumlah_stok.value = sw_jumlah.value;
            formStok.submit();
        }
    });
}

/* ================= HAPUS ================= */
function confirmDelete(id, nama) {
    Swal.fire({
        title: 'Hapus Data?',
        text: `Hapus stok produk "${nama}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus'
    }).then(result => {
        if (result.isConfirmed) {
            hapus_id.value = id;
            formDelete.submit();
        }
    });
}

/* ================= SEARCH TABLE ================= */
function searchTable() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const rows = document.querySelectorAll("#stokTable tbody tr");
    rows.forEach(row => {
        const text = row.cells[1].textContent.toLowerCase();
        row.style.display = text.includes(input) ? "" : "none";
    });
}
</script>
