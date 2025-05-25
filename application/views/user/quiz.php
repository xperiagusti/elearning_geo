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
            <h2 style="color:#6777ef"><b>Quiz</b></h2>
            <h6>Latih pemahamanmu melalui quiz ini yuk</h6>
            <hr style=" border-top: 2px solid #6777ef;">
            <div class="row">
                <?php foreach ($data->result() as $row): ?>
                <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                    <i class="fas fa-book-reader"></i>
                  </div>
                  <div class="card-body">
                    <h4>Topic : <?php echo character_limiter($row->judul_konten, 50); ?></h4>
                    <p>
                        <ul>
                            <!-- <li>Durasi : <?php echo $row->durasi_pg; ?> menit</li> -->
                            <li>Status : 
                            <?php if ($row->status_quiz == 1) {
                                 echo 'Belum Mengerjakan';
                            }
                            else
                            {
                                echo 'Sudah Mengerjakan';
                            } ?>
                            </li>
                            <!-- <li>Nilai Quiz : <?php echo $row->nilai; ?></li> -->
                        </ul> 
                    </p>
                    <?php if ($row->status_quiz == 1) {
                    echo "<a href='" . 'soal/' . "$row->id_peserta' class='card-cta';'>Mulai Quiz <i class='fas fa-chevron-right'></i></a>";
                    } ?>
                  </div>
                </div>
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