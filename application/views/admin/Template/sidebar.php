<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url('admin'); ?>"><B>DISASTER.CO</b></a>

    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url('admin');?>">D.CO</a>
    </div>
    <ul class="sidebar-menu">
      <!-- Dashboard -->
      <li class="menu-header">Main</li>
      <li class="<?php if (current_url() == base_url() . "admin") echo "active"; ?>"><a class="nav-link" href="<?php echo base_url() . "admin"; ?>"><i class="fa fa-globe"></i> <span>Dashboard </span></a></li>
      <li class="<?php if($this->uri->segment(2) == "user" || $this->uri->segment(2) == "akun") echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/user";?>"><i class="fas fa-user"></i> <span>User</span></a></li>
    </ul>

    <ul class="sidebar-menu" >
        <li class="menu-header" >Content</li>
        <li class="<?php if($this->uri->segment(2) == "berita")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/berita/daftar";?>"><i class="fas fa-newspaper"></i> <span>Berita</span></a></li>
        <li class="<?php if($this->uri->segment(2) == "carousel")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/carousel/daftar";?>"><i class="fas fa-newspaper"></i> <span>Poster</span></a></li>
        <li class="<?php if($this->uri->segment(2) == "jenis_bencana")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/jenis_bencana/daftar";?>"><i class="fas fa-cloud-sun"></i> <span>Jenis Bencana</span></a></li>
        <li class="<?php if($this->uri->segment(2) == "lokasi_bencana")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/lokasi_bencana/daftar";?>"><i class="fas fa-mountain"></i> <span>Lokasi Bencana</span></a></li>
        <li class="<?php if($this->uri->segment(2) == "konten")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/konten/daftar";?>"><i class="fas fa-book-open"></i> <span>Konten Belajar</span></a></li>

        <!-- <li class="<?php if($this->uri->segment(2) == "tugas")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/tugas/daftar";?>"><i class="fas fa-book-open"></i> <span>Tugas</span></a></li> -->
        <!-- <li class="<?php if($this->uri->segment(2) == "quiz")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/quiz/daftar";?>"><i class="fas fa-book-open"></i> <span>Quiz</span></a></li> -->

        <li class="dropdown <?php if($this->uri->segment(2) == "quiz") echo "active"; ?>";>
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-reader"></i></i> <span>Quiz</span></a>
                <ul class="dropdown-menu" style="display: none;">
                  <!-- <li class="<?php if(current_url() == base_url()."admin/quiz/daftar")echo "active"; ?> "><a class="nav-link" href="<?php echo base_url()."admin/quiz/daftar";?>">Daftar</a></li> -->
                  <li class="<?php if(current_url() == base_url()."admin/quiz/soal")echo "active"; ?> "><a class="nav-link" href="<?php echo base_url()."admin/quiz/soal";?>">Soal</a></li>
                  <li class="<?php if(current_url() == base_url()."admin/quiz/peserta")echo "active"; ?> "><a class="nav-link" href="<?php echo base_url()."admin/quiz/peserta";?>">Peserta</a></li>
                </ul>
							</li>
              <li class="<?php if($this->uri->segment(2) == "komentar")echo "active"; ?>"><a class="nav-link" href="<?php echo base_url()."admin/komentar/daftar";?>"><i class="fas fa-comment-alt"></i> <span>Komentar Siswa</span></a></li>
    </ul>

    <div class="mt-4 mb-2 p-3 hide-sidebar-mini">
            <a href="<?php echo base_url('user'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split" style=" box-shadow: 0 2px 6px #314f80;
              background-color: #273f6c;
              border-color: #273f6c;">
              <i class="fas fa-rocket"></i> Halaman Siswa
            </a>
          </div>

  </aside>
</div>