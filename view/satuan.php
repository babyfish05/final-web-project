<?php
$active = 'satuan';
require_once __DIR__ . '/partials/header.php';
?>

<div class="container">
<?php require_once __DIR__ . '/partials/sidebar.php'; ?>

<main class="content">
    <h1 class="page-title">Satuan</h1>

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
                <th>Nama Satuan</th>
                <th style="width:120px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($satuan)): ?>
            <?php $no = 1; ?>
            <?php foreach ($satuan as $row): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['nama_satuan']); ?></td>
                <td class="aksi">
                    <button class="btn-aksi edit"
                        onclick="openEdit(
                            '<?= $row['id_satuan']; ?>',
                            '<?= htmlspecialchars($row['nama_satuan'], ENT_QUOTES); ?>'
                        )">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>

                    <button class="btn-aksi delete"
                        onclick="confirmDelete(
                            '<?= $row['id_satuan']; ?>',
                            '<?= htmlspecialchars($row['nama_satuan'], ENT_QUOTES); ?>'
                        )">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="empty">Tidak ada data satuan</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</main>
</div>

<form method="post" id="formSatuan" style="display:none;">
    <input type="hidden" name="id_satuan" id="id_satuan">
    <input type="hidden" name="nama_satuan" id="nama_satuan">
</form>

<form method="post" id="formDelete" style="display:none;">
    <input type="hidden" name="hapus_id" id="hapus_id">
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
/*  TAMBAH  */
function openTambah() {
    Swal.fire({
        title: 'Tambah Satuan',
        input: 'text',
        inputPlaceholder: 'Masukkan nama satuan',
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        inputValidator: value => {
            if (!value) return 'Nama satuan wajib diisi!';
        }
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('id_satuan').value = ''; // 🔥 RESET ID
            document.getElementById('nama_satuan').value = result.value;
            document.getElementById('formSatuan').submit();
        }
    });
}


/*  EDIT  */
function openEdit(id, nama) {
    Swal.fire({
        title: 'Edit Satuan',
        input: 'text',
        inputValue: nama,
        showCancelButton: true,
        confirmButtonText: 'Update',
        cancelButtonText: 'Batal',
        inputValidator: value => {
            if (!value) return 'Nama satuan tidak boleh kosong!';
        }
    }).then(result => {
        if (result.isConfirmed) {
            document.getElementById('id_satuan').value = id;
            document.getElementById('nama_satuan').value = result.value;
            document.getElementById('formSatuan').submit();
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
