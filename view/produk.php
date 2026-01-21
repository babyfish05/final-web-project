<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
</head>
<body>

<h2>Data Produk</h2>

<!-- FORM INPUT -->
<form method="post" action="bren.php?page=produk&aksi=simpan">
    <input type="text" name="nama_produk" placeholder="Nama Produk" required>
    <input type="number" name="harga" placeholder="Harga" required>

    <select name="id_brand" required>
        <option value="">-- Pilih Brand --</option>
        <?php foreach ($brand as $b): ?>
            <option value="<?= $b['id_brand'] ?>">
                <?= $b['nama_brand'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Simpan</button>
</form>

<br>

<!-- TABEL DATA -->
<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Brand</th>
        <th>Aksi</th>
    </tr>

    <?php $no = 1; foreach ($produk as $row): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_produk'] ?></td>
        <td>Rp <?= number_format($row['harga']) ?></td>
        <td><?= $row['nama_brand'] ?></td>
        <td>
            <a href="bren.php?page=produk&aksi=hapus&id=<?= $row['id_produk'] ?>"
               onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
