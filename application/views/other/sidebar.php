<?php 
    $userlogin = $this->session->userdata("user");
    if($this->session->userdata("user")->foto == ""){
        $foto_profil = base_url("/assets/images/no-image.jpg");
    } else {
        $foto_profil = $this->config->item("cdn_url")."/".$this->session->userdata("user")->foto;
    }
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>"> <img style="margin-top: 6px;" alt="image" src="<?php echo base_url("assets/img/logo.png"); ?>" class="header-logo" /></a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture" style="margin-right: 0px;">
                <img alt="image" src="<?php echo $foto_profil; ?>">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name"><?php echo $userlogin->nama; ?></div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <!-- <li class="<?php if(!empty($dashboard)){ echo $dashboard;} ?>">
                <a class="nav-link" href="<?php echo base_url("dashboard.html") ?>">
                    <i data-feather="monitor"></i><span>Dashboard</span>
                </a>
            </li> -->
            <!-- <li class="<?php if(!empty($project)){ echo $project;} ?>">
                <a class="nav-link" href="<?php echo base_url("project.html") ?>">
                    <i data-feather="folder-minus"></i><span>Project</span>
                </a>
            </li>
            <li class="<?php if(!empty($penerbit)){ echo $penerbit;} ?>">
                <a class="nav-link" href="<?php echo base_url("penerbit.html") ?>">
                    <i data-feather="users"></i><span>Penerbit</span>
                </a>
            </li> -->
            <li class="dropdown <?php if(!empty($verifikasi)){ echo $verifikasi;} ?>">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-id-card" style="margin-left: -4px; margin-right: 7px;"></i><span>Verifikasi</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if(!empty($verifikasi_kyc_investor)){ echo $verifikasi_kyc_investor;} ?>"><a class="nav-link" href="<?php echo base_url("verifikasi/kyc_investor.html") ?>">KYC Investor</a></li>
                    <li class="<?php if(!empty($verifikasi_kyc_penerbit)){ echo $verifikasi_kyc_penerbit;} ?>"><a class="nav-link" href="<?php echo base_url("verifikasi/kyc_penerbit.html") ?>">KYC Penerbit</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if(!empty($manajemen_proyek)){ echo $manajemen_proyek;} ?>">
                <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>Manajemen Proyek</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if(!empty($manajemen_proyek_verifikasi_proyek)){ echo $manajemen_proyek_verifikasi_proyek;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_proyek/verifikasi_proyek.html") ?>">Verifikasi Proyek</a></li>
                    <li class="<?php if(!empty($manajemen_proyek_sedang_berjalan)){ echo $manajemen_proyek_sedang_berjalan;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_proyek/sedang_berjalan.html") ?>">Sedang Berjalan</a></li>
                    <li class="<?php if(!empty($manajemen_proyek_selesai)){ echo $manajemen_proyek_selesai;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_proyek/selesai.html") ?>">Selesai</a></li>
                </ul>
            </li>
            <li class="<?php if(!empty($manajemen_investor)){ echo $manajemen_investor;} ?>">
                <a class="nav-link" href="<?php echo base_url("manajemen_investor.html") ?>">
                    <i data-feather="users"></i><span>Manajemen Investor</span>
                </a>
            </li>
            <li class="<?php if(!empty($manajemen_penerbit)){ echo $manajemen_penerbit;} ?>">
                <a class="nav-link" href="<?php echo base_url("manajemen_penerbit.html") ?>">
                    <i data-feather="user"></i><span>Manajemen Penerbit</span>
                </a>
            </li>
            <li class="dropdown <?php if(!empty($manajemen_transaksi)){ echo $manajemen_transaksi;} ?>">
                <a href="#" class="nav-link has-dropdown"><i data-feather="trending-up"></i><span>Manajemen Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if(!empty($manajemen_transaksi_jual_beli)){ echo $manajemen_transaksi_jual_beli;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_transaksi/jual_beli.html") ?>">pembelian saham (primary)</a></li>
                    <li class="<?php if(!empty($manajemen_transaksi_biaya_admin)){ echo $manajemen_transaksi_biaya_admin;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_transaksi/biaya_admin.html") ?>">Biaya Admin</a></li>
                    <li class="<?php if(!empty($manajemen_transaksi_isi_saldo)){ echo $manajemen_transaksi_isi_saldo;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_transaksi/isi_saldo.html") ?>">Isi Saldo</a></li>
                </ul>
            </li>
            <li class="dropdown <?php if(!empty($manajemen_konten)){ echo $manajemen_konten;} ?>">
                <a href="#" class="nav-link has-dropdown"><i data-feather="edit"></i><span>Manajemen Konten</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if(!empty($manajemen_konten_syarat_dan_ketentuan)){ echo $manajemen_konten_syarat_dan_ketentuan;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_konten/syarat_dan_ketentuan.html") ?>">Syarat dan Ketentuan</a></li>
                    <li class="<?php if(!empty($manajemen_konten_kebijakan_dan_privasi)){ echo $manajemen_konten_kebijakan_dan_privasi;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_konten/kebijakan_dan_privasi.html") ?>">Kebijakan dan Privasi</a></li>
                    <li class="<?php if(!empty($manajemen_konten_risiko)){ echo $manajemen_konten_risiko;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_konten/risiko.html") ?>">Risiko</a></li>
                    <li class="<?php if(!empty($manajemen_konten_banner)){ echo $manajemen_konten_banner;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_konten/banner.html") ?>">Banner</a></li>
                    <li class="<?php if(!empty($manajemen_konten_untuk_di_perhatikan)){ echo $manajemen_konten_untuk_di_perhatikan;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_konten/untuk_di_perhatikan.html") ?>">Footer</a></li>
                    <li class="<?php if(!empty($manajemen_konten_daftar_penerbit)){ echo $manajemen_konten_daftar_penerbit;} ?>"><a class="nav-link" href="<?php echo base_url("manajemen_konten/daftar_penerbit.html") ?>">Halaman Penerbit</a></li>
                </ul>
            </li>
            <li class="<?php if(!empty($konfigurasi)){ echo $konfigurasi;} ?>">
                <a class="nav-link" href="<?php echo base_url("konfigurasi.html") ?>">
                    <i data-feather="settings"></i><span>Konfigurasi</span>
                </a>
            </li>
            <li class="dropdown <?php if(!empty($log)){ echo $log;} ?>">
                <a href="#" class="nav-link has-dropdown"><i data-feather="database"></i><span>Log</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php if(!empty($log_admin)){ echo $log_admin;} ?>"><a class="nav-link" href="<?php echo base_url("log/admin.html") ?>">Admin</a></li>
                    <li class="<?php if(!empty($log_penerbit)){ echo $log_penerbit;} ?>"><a class="nav-link" href="<?php echo base_url("log/penerbit.html") ?>">Penerbit</a></li>
                    <li class="<?php if(!empty($log_pemodal)){ echo $log_pemodal;} ?>"><a class="nav-link" href="<?php echo base_url("log/pemodal.html") ?>">Pemodal</a></li>
                </ul>
            </li>
            <li class="<?php if(!empty($admin)){ echo $admin;} ?>">
                <a class="nav-link" href="<?php echo base_url("admin.html") ?>">
                    <i class="far fa-user" style="margin-left: -4px; margin-right: 7px;"></i><span>Admin</span>
                </a>
            </li>
            <li class="<?php if(!empty($akses)){ echo $akses;} ?>">
                <a class="nav-link" href="<?php echo base_url("akses.html") ?>">
                    <i data-feather="user-check"></i><span>Akses</span>
                </a>
            </li>
        </ul>
    </aside>
</div>