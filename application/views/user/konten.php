<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hai, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?></h1>
        </div>

        <!-- <div class="section-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body" style="padding:0px">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url(); ?>assets/img/unsplash/sky.jpg"
                                            alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url(); ?>assets/img/unsplash/volcano.jpg"
                                            alt="Second slide">
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
                </div>
            </div>
        </div> -->

        <div class="section-body" id="konten">
            <h2 style="color:#6777ef"><b>E-Knowledge</b></h2>
            <h6>Coba baca konten ini yuk, untuk menambah pengetahuanmu </h6>
            <hr style=" border-top: 2px solid #6777ef;">
            <div class="row">
                <?php foreach ($data->result() as $row): ?>
                <div class="col-12 col-md-4 col-lg-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image"
                                data-background="<?= base_url('upload/konten/' . $row->foto_konten); ?>">
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-category"><a><?php echo $row->kategori; ?></a>
                                <div class="bullet"></div> <a><?= date('d F Y', strtotime($row->tgl_posting)); ?></a>
                            </div>
                            <div class="article-title">
                                <h2><a href="<?php echo base_url(); ?>user/detail/<?= $row->id_konten;?>"> <?php echo character_limiter($row->judul_konten, 50); ?></a></h2>
                            </div>
                            <p> <?php
                                    $isi_konten = strip_tags($row->isi_konten);
                                    echo strlen($isi_konten) > 100 ? substr($isi_konten, 0, 100) . '...' : $isi_konten;
                                    ?></p>
                            <div class="article-user">
                                <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png">
                                <div class="article-user-details">
                                    <div class="user-detail-name">
                                        <a href="#"><?php echo $row->author; ?></a>
                                    </div>
                                    <div class="text-job">Guru Geografi</div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
                
            </div>
            <div class="col-12 col-md-12">
            <div class="d-flex">
            <div class="mx-auto">
                    <?php echo $pagination; ?>
                </div>
                </div>
                </div>

        </div>
       



    </section>
</div>