<?php if(session()->level == 1): ?>
<li class="menu-header">Dashboard</li>
<li <?= current_url(true)->getSegment(1) == 'home' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url()?>"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
<li class="menu-header">Master</li>
<li <?= current_url(true)->getSegment(1) == 'kecamatan' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('kecamatan')?>"><i class="far fa-square"></i> <span>Kecamatan</span></a></li>
<li <?= current_url(true)->getSegment(1) == 'desa' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('desa')?>"><i class="fas fa-th"></i> <span>Desa/Kelurahan</span></a></li>
<li <?= current_url(true)->getSegment(1) == 'rak' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('rak')?>"><i class="fas fa-th-large"></i> <span>Rak</span></a></li>
<li class="menu-header">Transaksi</li>
<li <?= current_url(true)->getSegment(1) == 'warkah' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('warkah')?>"><i class="far fa-file-alt"></i> <span>Arsip</span></a></li>
<li <?= current_url(true)->getSegment(1) == 'peminjaman' && current_url(true)->getSegment(2) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('peminjaman')?>"><i class="fas fa-cart-arrow-down"></i> <span>Peminjaman Arsip</span></a></li>
<li <?= current_url(true)->getSegment(1) == 'peminjaman' && current_url(true)->getSegment(2) == 'export' ? 'class="active"' : '' ?>><a class="nav-link" href="<?=site_url('peminjaman/export')?>"><i class="fas fa-download"></i> <span>Laporan</span></a></li>
<li class="menu-header">Settings</li>
<li <?= current_url(true)->getSegment(1) == 'users' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('users')?>"><i class="far fa-user"></i> <span>Users</span></a></li>
<?php endif; ?>

<?php if(session()->level == 2): ?>
<li class="menu-header">Dashboard</li>
<li <?= current_url(true)->getSegment(1) == 'home' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url()?>"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
<li class="menu-header">Transaksi</li>
<li <?= current_url(true)->getSegment(1) == 'warkah' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('warkah')?>"><i class="far fa-file-alt"></i> <span>Arsip</span></a></li>
<li <?= current_url(true)->getSegment(1) == 'peminjaman' && current_url(true)->getSegment(2) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('peminjaman')?>"><i class="fas fa-cart-arrow-down"></i> <span>Peminjaman Arsip</span></a></li>
<li <?= current_url(true)->getSegment(1) == 'peminjaman' && current_url(true)->getSegment(2) == 'export' ? 'class="active"' : '' ?>><a class="nav-link" href="<?=site_url('peminjaman/export')?>"><i class="fas fa-download"></i> <span>Laporan</span></a></li>
<?php endif; ?>