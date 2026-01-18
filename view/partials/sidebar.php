<?php
// ambil page dari URL
$page = $_GET['page'] ?? 'dashboard';
?>

<aside class="sidebar">
    <div class="profile">
        <div class="avatar"></div>
        <p>User Admin</p>
    </div>

    <ul class="menu">

        <li class="<?= $page === 'dashboard' ? 'active' : '' ?>">
            <a href="/final-web-project/index.php?page=dashboard">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="<?= $page === 'kategori' ? 'active' : '' ?>">
            <a href="/final-web-project/index.php?page=kategori">
                <i class="fa-solid fa-tags"></i>
                <span>Kategori</span>
            </a>
        </li>

        <li class="<?= $page === 'brand' ? 'active' : '' ?>">
            <a href="/final-web-project/index.php?page=brand">
                <i class="fa-solid fa-boxes-packing"></i>
                <span>Brand</span>
            </a>
        </li>

        <li class="<?= $page === 'produk' ? 'active' : '' ?>">
            <a href="/final-web-project/index.php?page=produk">
                <i class="fa-solid fa-box-open"></i>
                <span>Produk</span>
            </a>
        </li>

        <li class="<?= $page === 'satuan' ? 'active' : '' ?>">
            <a href="/final-web-project/index.php?page=satuan">
                <i class="fa-solid fa-box"></i>
                <span>Satuan</span>
            </a>
        </li>

        <li class="<?= $page === 'stok' ? 'active' : '' ?>">
            <a href="/final-web-project/index.php?page=stok">
                <i class="fa-solid fa-boxes-stacked"></i>
                <span>Stok</span>
            </a>
        </li>

    </ul>

    <div class="logout">
        <a href="/final-web-project/controllers/logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>
