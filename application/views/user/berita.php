<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hai, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?></h1>
        </div>

        <div class="section-body" id="konten">
            <h2 style="color:#6777ef"><b>Info Terkini</b></h2>
            <h6>Ada info penting nih, jangan sampai ketinggalan ya</h6>
            <hr style=" border-top: 2px solid #6777ef;">
            <div class="row">
                <?php foreach ($data->result() as $row): ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <div class="article-image"
                                data-background="<?= base_url('upload/berita/' . $row->foto_berita); ?>">
                            </div>
                            <div class="article-badge">
                                <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-category"><a href="#"><?php echo $row->kategori; ?></a>
                                <div class="bullet"></div> <a
                                    href="#"><?= date('d F Y', strtotime($row->tgl_posting)); ?></a>
                            </div>
                            <div class="article-title">
                                <h2><a href="<?= base_url(); ?>user/details/<?= $row->id_berita; ?>"><?php echo character_limiter($row->judul_berita, 50); ?></a></h2>
                            </div>
                            <p><?php
                                    $isi_berita = strip_tags($row->isi_berita);
                                    echo strlen($isi_berita) > 100 ? substr($isi_berita, 0, 100) . '...' : $isi_berita;
                                    ?></p>
                             <div class="article-cta text-center">
                                <a href="<?= base_url(); ?>user/details/<?= $row->id_berita; ?>" class="btn btn-primary">Details</a>
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