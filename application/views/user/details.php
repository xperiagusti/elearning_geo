

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hai, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?></h1>
        </div>

        <div class="section-body" id="konten">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="padding:0px">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100"
                                            src="<?= base_url('upload/berita/' . $berita['foto_berita']); ?>" style="max-height:500px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <article class="article article-style-c">
                        <div class="article-details">
                            <div class="article-category"><a href="#"><?php echo $berita['kategori'];?></a>
                                <div class="bullet"></div> <a
                                    href="#"><?= date('d F Y', strtotime($berita['tgl_posting'])); ?></a>
                            </div>
                            <div class="article-title mt-3 mb-3">
                                <p><a href="" style="font-size:20px"> <?php echo $berita['judul_berita'];?></a>
                                    </p>
                            </div>
                            <p><?php echo $berita['isi_berita'];?></p>
                            <!-- <div class="article-cta text-center">
                                <a href="<?= base_url(); ?>user/details/<?= $row->id_berita; ?>"
                                    class="btn btn-primary">Details</a>
                            </div> -->
                        </div>
                    </article>
                </div>


            </div>


        </div>




    </section>
</div>