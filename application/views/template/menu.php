

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('public/')?>index3.html" class="brand-link">
      <img src="<?=base_url('public/')?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Raport</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('public/')?>dist/img/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?php if($pusat=="Dashboard"){ ?>menu-open<?php } ?>">
            <a href="<?=base_url('')?>" class="nav-link <?php if($pusat=="Dashboard"){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php if($pusat=="Master"){ ?>menu-open<?php } ?>">
            <a href="#" class="nav-link <?php if($pusat=="Master"){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/kelas')?>" class="nav-link <?php if($menu=="Kelas"){ ?>active<?php } ?>">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Data Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/guru')?>" class="nav-link <?php if($menu=="Guru"){ ?>active<?php } ?>">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Data Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/siswa')?>" class="nav-link <?php if($menu=="Siswa"){ ?>active<?php } ?>">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/mapel')?>" class="nav-link <?php if($menu=="Mata Pelajaran"){ ?>active<?php } ?>">
                  <i class="fas fa-book nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Penugasan</li>
          <li class="nav-item <?php if($pusat=="Penugasan"){ ?>menu-open<?php } ?>">
            <a href="#" class="nav-link <?php if($pusat=="Penugasan"){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Penugasan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/kelassiswa')?>" class="nav-link <?php if($menu=="Kelas Siswa"){ ?>active<?php } ?>">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Kelas Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/gurumapel')?>" class="nav-link <?php if($menu=="Guru Mapel"){ ?>active<?php } ?>">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Guru Mapel</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Penilaian</li>
          <li class="nav-item <?php if($pusat=="Rapor"){ ?>menu-open<?php } ?>">
            <a href="#" class="nav-link <?php if($pusat=="Rapor"){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Penilaian
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/nilaispiritual')?>" class="nav-link <?php if($menu=="Spiritual"){ ?>active<?php } ?>">
                  <i class="fas fa-quran nav-icon"></i>
                  <p>Nilai Spiritual</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/nilaisosial')?>" class="nav-link <?php if($menu=="Sosial"){ ?>active<?php } ?>">
                  <i class="fas fa-people-arrows nav-icon"></i>
                  <p>Nilai Sosial</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/nilaipengetahuan')?>" class="nav-link <?php if($menu=="Pengetahuan"){ ?>active<?php } ?>">
                  <i class="fas fa-atlas nav-icon"></i>
                  <p>Nilai Pengetahuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/nilaiketerampilan')?>" class="nav-link <?php if($menu=="Keterampilan"){ ?>active<?php } ?>">
                  <i class="fas fa-swimmer nav-icon"></i>
                  <p>Nilai Keterampilan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Pengaturan</li>
          <li class="nav-item <?php if($pusat=="Pengaturan"){ ?>menu-open<?php } ?>">
            <a href="#" class="nav-link <?php if($pusat=="Pengaturan"){ ?>active<?php } ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Pengaturan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/sekolah')?>" class="nav-link <?php if($menu=="Sekolah"){ ?>active<?php } ?>">
                  <i class="fas fa-school nav-icon"></i>
                  <p>Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/tahunajaran')?>" class="nav-link <?php if($menu=="Tahun Ajaran"){ ?>active<?php } ?>">
                  <i class="fas fa-graduation-cap nav-icon"></i>
                  <p>Tahun Ajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('admin/administrator')?>" class="nav-link <?php if($menu=="Administrator"){ ?>active<?php } ?>">
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>Administrator</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$awal ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('')?>">Home</a></li>
              <li class="breadcrumb-item"><?=$pusat?></li>
              <li class="breadcrumb-item active"><?=$menu?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
