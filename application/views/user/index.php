<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hai, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?></h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Siswa</a></div>
              <div class="breadcrumb-item">Home</div>
            </div> -->
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mx-auto text-center">
                                    <div class="bodymovin" data-icon="assets/json/online-learning.json"></div>
                                </div>
                                <div class="col-md-8 mx-auto text-center">
                                    <h3 class="mt-3"><b>Yuk Belajar Geografi</b> 🌋</h3>

                                    <p class="lead">Mari kita manfaatkan e-learning untuk mempelajari bencana alam
                                        melalui lensa geografi,
                                        sehingga kita dapat menjadi garda terdepan dalam mitigasi dan penanggulangan
                                        bencana di masa depan!
                                    </p>
                                    <a href="#konten" class="btn btn-primary">Let's Go</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer bg-whitesmoke">
                            This is card footer
                        </div> -->
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mx-auto text-center">
                                    <h3 class="mt-3">🌏 <b>Apa Yang Kita Pelajari?</b></h3>

                                    <p class="lead">
                                       Dengan e-learning ini, siswa dapat belajar secara interaktif dan mengembangkan keterampilan serta pengetahuan meliputi jenis-jenis, dampak, dan penyebab bencana alam.
                                    </p>
                                </div>
                                <div class="col-md-4 mx-auto text-center">
                                    <div class="bodymovin"
                                        data-icon="https://assets10.lottiefiles.com/packages/lf20_or6fwjj6.json"></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-footer bg-whitesmoke">
                            This is card footer
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body" style="padding:0px">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url(); ?>assets/img/unsplash/sky.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url(); ?>assets/img/unsplash/volcano.jpg" alt="Second slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>





        <div class="section-body" id="konten">

            <h2 style="color:#6777ef"><b>E-Knowledge</b></h2>
            <h6>Coba baca konten ini yuk, untuk menambah pengetahuanmu </h6>
            <hr style=" border-top: 2px solid #6777ef;">
            <div class="row">
                <?php foreach ($belajar as $a): ?>
                <div class="col-12 col-md-4 col-lg-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image"
                                data-background="<?= base_url('upload/konten/' . $a['foto_konten']); ?>">
                            </div>
                            <!-- <div class="article-badge">
                                <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i>
                                    <?php echo $a['kategori']; ?></div>
                            </div> -->
                        </div>
                        <div class="article-details">
                            <div class="article-category"><a><?php echo $a['kategori']; ?></a>
                                <div class="bullet"></div> <a><?= date('d F Y', strtotime($a['tgl_posting'])); ?></a>
                            </div>
                            <div class="article-title">
                                <h2><a href="<?php echo base_url(); ?>user/detail/<?= $a['id_konten'];?>"> <?php echo character_limiter($a['judul_konten'], 50); ?></a></h2>
                            </div>
                            <p> <?php
                                    $isi_konten = strip_tags($a['isi_konten']);
                                    echo strlen($isi_konten) > 100 ? substr($isi_konten, 0, 100) . '...' : $isi_konten;
                                    ?></p>
                            <div class="article-user">
                                <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png">
                                <div class="article-user-details">
                                    <div class="user-detail-name">
                                        <a href=""><?php echo $a['author']; ?></a>
                                    </div>
                                    <div class="text-job">Guru Geografi</div>
                                </div>
                            </div>
                        </div>
                    </article>

                </div>
                <?php endforeach; ?>
                <div class="col-12 col-md-12 text-center">
                    <a href="<?php echo base_url()."user/konten";?>" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>

        </div>

        <div class="section-body mt-5" id="konten">

            <h2 style="color:#6777ef"><b>Info Terkini</b></h2>
            <h6>Ada info penting nih, jangan sampai ketinggalan ya</h6>
            <hr style=" border-top: 2px solid #6777ef;">


            <div class="row">
                <?php foreach ($berita as $a): ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image"
                                data-background="<?= base_url('upload/berita/' . $a['foto_berita']); ?>">
                            </div>
                            <div class="article-badge">
                                <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-category"><a><?php echo $a['kategori']; ?></a>
                                <div class="bullet"></div><a><?= date('d F Y', strtotime($a['tgl_posting'])); ?></a>
                            </div>
                            <div class="article-title">
                                <h2><a href="<?php echo base_url(); ?>user/details/<?= $a['id_berita'];?>"><?php echo character_limiter($a['judul_berita'], 50); ?></a></h2>
                            </div>
                            <p><?php
                                    $isi_berita = strip_tags($a['isi_berita']);
                                    echo strlen($isi_berita) > 100 ? substr($isi_berita, 0, 100) . '...' : $isi_berita;
                                    ?></p>
                            <div class="article-cta text-center">
                                <a href="<?php echo base_url(); ?>user/details/<?= $a['id_berita'];?>" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
                <div class="col-12 col-md-12 text-center">
                    <a href="<?php echo base_url()."user/berita";?>" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>

        </div>


    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.querySelector('.btn-primary');
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        var target = document.querySelector(this.getAttribute('href'));
        target.scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>