<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <?php
    $bulan = date('m');
    $tahun = date('Y');
    ?>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/laporan?filter=2&bulan=' . $bulan . '&tahun=' . $tahun) ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Laporan</span>
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
            <i class="fas fa-fw fa-question"></i>
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
            <a class="dropdown-item" href="<?php echo site_url('admin/emot/add') ?>">Tambah Emot</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/emot') ?>">Tabel Emot</a>
        </div>
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