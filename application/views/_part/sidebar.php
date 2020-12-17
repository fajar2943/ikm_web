<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'bidang' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Bidang</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/bidang/add') ?>">Tambah Bidang</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/bidang') ?>">Tabel Bidang</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'pertanyaan' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-list"></i>
            <span>Pertanyaan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/pertanyaan/add') ?>">Tambah Pertanyaan</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/pertanyaan') ?>">Tabel Pertanyaan</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'emot' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fas fa-images"></i>
            <span>Emoticon</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/emot/add') ?>">Tambah Penilaian</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/emot') ?>">Tabel Penilaian</a>
        </div>
    </li>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'reseller' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Reseller</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/reseller/add') ?>">Tambah Reseller</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/reseller') ?>">Tabel Reseller</a>
        </div>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'pembelian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/pembelian') ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pembelian</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/transaksi') ?>">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Transaksi</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'batal_pembelian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/batal_pembelian') ?>">
            <i class="fas fa-fw fa-times-circle"></i>
            <span>Batal Pembelian</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'return_stok' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/return_stok') ?>">
            <i class="fas fa-fw fa-retweet"></i>
            <span>Return Stok</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'arsips' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/arsips') ?>">
            <i class="fas fa-fw fa-archive"></i>
            <span>Arsip Produk</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'about' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/about') ?>">
            <i class="fas fa-fw fa-info"></i>
            <span>Instansi</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/user') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Keluar</span></a>
    </li>
</ul>