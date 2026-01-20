<?php
$active = 'kategori';
require_once __DIR__ . '/partials/header.php';
?>

<div class="container">
<?php require_once __DIR__ . '/partials/sidebar.php'; ?>

<main class="content">
    <h1 class="page-title">Kategori</h1>

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
                <th style="width:80px;">No</th>
                <th>Nama Kategori</th>
                <th style="width:120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($kategori)): ?>
            <?php $no = 1; ?>
            <?php foreach ($kategori as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                <td class="aksi">
                    <button class="btn-aksi edit"
                        onclick="openEdit(
                            '<?= $row['id_kategori']; ?>',
                            '<?= htmlspecialchars($row['nama_kategori'], ENT_QUOTES); ?>'
                        )">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>

                    <button class="btn-aksi delete"
                        onclick="confirmDelete(
                            '<?= $row['id_kategori']; ?>',
                            '<?= htmlspecialchars($row['nama_kategori'], ENT_QUOTES); ?>'
                        )">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="empty">Tidak ada data kategori</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</main>
</div>
<form method="post" id="formKategori" style="display:none;">
    <input type="hidden" name="id_kategori" id="id_kategori">
    <input type="hidden" name="nama_kategori" id="nama_kategori">
</form>

<form method="post" id="formDelete" style="display:none;">
    <input type="hidden" name="hapus_id" id="hapus_id">
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/*  TAMBAH  */
function openTambah() {
    Swal.fire({
        title: 'Tambah Kategori',
        input: 'text',
        inputPlaceholder: 'Masukkan nama kategori',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        inputValidator: value => {
            if (!value) return 'Nama kategori wajib diisi!';
        }
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('id_kategori').value = '';
            document.getElementById('nama_kategori').value = result.value;
            document.getElementById('formKategori').submit();
        }
    });
}

/*  EDIT  */
function openEdit(id, nama) {
    Swal.fire({
        title: 'Edit Kategori',
        input: 'text',
        inputValue: nama,
        showCancelButton: true,
        confirmButtonText: 'Update',
        cancelButtonText: 'Batal',
        inputValidator: value => {
            if (!value) return 'Nama kategori tidak boleh kosong!';
        }
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('id_kategori').value = id;
            document.getElementById('nama_kategori').value = result.value;
            document.getElementById('formKategori').submit();
        }
    });
}

/*  HAPUS  */
function confirmDelete(id, nama) {
    Swal.fire({
        title: 'Hapus Data?',
        text: `Apakah Anda ingin menghapus "${nama}"?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('hapus_id').value = id;
            document.getElementById('formDelete').submit();
        }
    });
}
</script>
