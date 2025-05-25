<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>


        <div class="row">

            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg-parallax"
                    style="background-image: url('assets/img/unsplash/sea.jpg');">
                    <div class="hero-inner">
                        <h2>Selamat Datang, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?> ! 😄
                        </h2>
                        <p class="lead"></p>

                    </div>
                </div>
            </div>



            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="<?php echo base_url() . "admin/user"; ?>">
                    <div class="card card-statistic-1 ">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pengguna</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalPengguna;?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="<?php echo base_url()."admin/berita/daftar";?>">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Berita</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalBerita;?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="<?php echo base_url()."admin/konten/daftar";?>">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Konten</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalKonten;?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="<?php echo base_url() . "admin/lokasi_bencana/daftar"; ?>">
                    <div class="card card-statistic-1 ">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Lokasi Bencana</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalLokasi;?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="<?php echo base_url()."admin/jenis_bencana/daftar";?>">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-cloud-sun"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Jenis Bencana</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalJenis;?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="<?php echo base_url()."admin/quiz/peserta";?>">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Peserta Quiz</h4>
                            </div>
                            <div class="card-body">
                                <?php echo $totalPeserta;?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </section>
</div>