<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hai, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?></h1>
        </div>

        <div class="section-body" id="konten">
            <div class="row">
                <div class="col-12">
                    <article class="article article-style-c">
                        <div class="article-details">
                            <div class="article-title mt-3 mb-1">
                                <p><a href="" style="font-size:20px">Let me know about your feeling using this
                                        e-elearning</a>
                                </p>
                            </div>
                            <?php if($this->session->flashdata('flashTambah')) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                          <strong>Terima kasih atas masukkannya dan Semoga Sukses selalu 😄</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="" method="post" <?php echo form_open_multipart('search/post_func');?><br>
                            <input type="hidden" name="author" value="<?php echo $user['nama_depan'];?>">
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-12">
                                        <textarea type="text" class="summernote-simple" name="keterangan"
                                            placeholder="Tulis komentar anda disini"><?= set_value('isi_berita'); ?></textarea>
                                        <small class="form-text text-danger"><?= form_error('judul_berita');?></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button class="btn btn-primary" name="tambah">Submit</button>
                                    </div>
                                </div>
                            </form>
                    </article>
                </div>


            </div>


        </div>




    </section>
</div>