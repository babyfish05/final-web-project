<?php
$active = 'produk';
require_once __DIR__ . '/partials/header.php';
?>

<div class="container">
<?php require_once __DIR__ . '/partials/sidebar.php'; ?>

<main class="content">
    <h1 class="page-title">Produk</h1>

    <div class="date-card">
        <span class="date">Date: <?= date('d/m/Y') ?></span>
        <span class="day"><?= date('l') ?></span>
    </div>

    <div class="toolbar">
        <button class="btn-tambah" onclick="openTambah()">
            <span class="icon">+</span>
            <span class="text">Tambah</span>
        </button>

        <div class="search-box">
            <input type="search" placeholder="Search">
            <span class="search-icon">🔍</span>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th style="width:60px;">No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Brand</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th style="width:120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($produk)): ?>
            <?php $no = 1; ?>
            <?php foreach ($produk as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_produk']); ?></td>
                <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                <td><?= htmlspecialchars($row['nama_brand']); ?></td>
                <td><?= htmlspecialchars($row['nama_satuan']); ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td class="aksi">
                    <button class="btn-aksi edit"
                        onclick="openEdit(
                            '<?= $row['id_produk']; ?>',
                            '<?= htmlspecialchars($row['nama_produk'], ENT_QUOTES); ?>',
                            '<?= $row['id_kategori']; ?>',
                            '<?= $row['id_brand']; ?>',
                            '<?= $row['id_satuan']; ?>',
                            '<?= $row['harga']; ?>'
                        )">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>

                    <button class="btn-aksi delete"
                        onclick="confirmDelete(
                            '<?= $row['id_produk']; ?>',
                            '<?= htmlspecialchars($row['nama_produk'], ENT_QUOTES); ?>'
                        )">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="empty">Tidak ada data produk</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</main>
</div>

<!-- FORM HIDDEN -->
<form method="post" id="formProduk" style="display:none;">
    <input type="hidden" name="id_produk" id="id_produk">
    <input type="hidden" name="nama_produk" id="nama_produk">
    <input type="hidden" name="id_kategori" id="id_kategori">
    <input type="hidden" name="id_brand" id="id_brand">
    <input type="hidden" name="id_satuan" id="id_satuan">
    <input type="hidden" name="harga" id="harga">
</form>

<form method="post" id="formDelete" style="display:none;">
    <input type="hidden" name="hapus_id" id="hapus_id">
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/* ================= TAMBAH ================= */
function openTambah() {
    Swal.fire({
        title: 'Tambah Produk',
        html: `
            <input id="sw_nama" class="swal2-input" placeholder="Nama Produk">
            <input id="sw_harga" type="number" class="swal2-input" placeholder="Harga">

            <select id="sw_kategori" class="swal2-select">
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>">
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="sw_brand" class="swal2-select">
                <?php foreach ($brand as $b): ?>
                    <option value="<?= $b['id_brand']; ?>">
                        <?= $b['nama_brand']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="sw_satuan" class="swal2-select">
                <?php foreach ($satuan as $s): ?>
                    <option value="<?= $s['id_satuan']; ?>">
                        <?= $s['nama_satuan']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        `,
        confirmButtonText: 'Simpan',
        showCancelButton: true,
        preConfirm: () => {
            if (!sw_nama.value || !sw_harga.value) {
                Swal.showValidationMessage('Semua field wajib diisi');
            }
        }
    }).then(result => {
        if (result.isConfirmed) {
            id_produk.value = '';
            nama_produk.value = sw_nama.value;
            harga.value = sw_harga.value;
            id_kategori.value = sw_kategori.value;
            id_brand.value = sw_brand.value;
            id_satuan.value = sw_satuan.value;
            formProduk.submit();
        }
    });
}

/* ================= EDIT ================= */
function openEdit(id, nama, kategori, brand, satuan, hargaVal) {
    Swal.fire({
        title: 'Edit Produk',
        html: `
            <input id="sw_nama" class="swal2-input" value="${nama}">
            <input id="sw_harga" type="number" class="swal2-input" value="${hargaVal}">

            <select id="sw_kategori" class="swal2-select">
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>">
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="sw_brand" class="swal2-select">
                <?php foreach ($brand as $b): ?>
                    <option value="<?= $b['id_brand']; ?>">
                        <?= $b['nama_brand']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="sw_satuan" class="swal2-select">
                <?php foreach ($satuan as $s): ?>
                    <option value="<?= $s['id_satuan']; ?>">
                        <?= $s['nama_satuan']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        `,
        didOpen: () => {
            sw_kategori.value = kategori;
            sw_brand.value = brand;
            sw_satuan.value = satuan;
        },
        confirmButtonText: 'Update',
        showCancelButton: true
    }).then(result => {
        if (result.isConfirmed) {
            id_produk.value = id;
            nama_produk.value = sw_nama.value;
            harga.value = sw_harga.value;
            id_kategori.value = sw_kategori.value;
            id_brand.value = sw_brand.value;
            id_satuan.value = sw_satuan.value;
            formProduk.submit();
        }
    });
}

/* ================= HAPUS ================= */
function confirmDelete(id, nama) {
    Swal.fire({
        title: 'Hapus Data?',
        text: `Hapus produk "${nama}" ?`,
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
</script>
