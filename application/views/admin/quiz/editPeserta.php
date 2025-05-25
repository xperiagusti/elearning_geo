<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/pesertaQuiz";?>">Peserta</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Peserta</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" <?php echo form_open_multipart('search/post_func');?><br>
                                <input type="hidden" name="id" value="<?= $quiz['id_peserta'];?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Topik
                                        Quiz</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="id_konten" class="form-control select2">
                                            <?php foreach($soal as $a) : ?>
                                            <?php if($a['id_konten'] == $quiz['id_konten']):?>
                                            <option value="<?= $a['id_konten'];?>" selected><?= $a['topik'];?>
                                            </option>
                                            <?php else : ?>
                                            <option value="<?= $a['id_konten'];?>"><?= $a['topik'];?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('id_konten');?></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Peserta</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="id_user" class="form-control select2">
                                            <?php foreach($user2 as $a) : ?>
                                            <?php if($a['id'] == $quiz['id_user']):?>
                                            <option value="<?= $a['id'];?>" selected><?= $a['nama_depan'];?> <?= $a['nama_belakang'];?>
                                            </option>
                                            <?php else : ?>
                                            <option value="<?= $a['id'];?>"><?= $a['nama_depan'];?> <?= $a['nama_belakang'];?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('id_user');?></small>
                                    </div>
                                </div>

                                <!-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Durasi
                                        Quiz</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" name="durasi_pg"
                                            placeholder="Masukan Durasi Quiz dengan angka dalam hitungan menit"
                                            value="<?php echo $quiz['durasi_pg'];?>">
                                        <small class="form-text text-danger"><?= form_error('durasi_pg');?></small>
                                    </div>
                                </div> -->

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" name="tambah">Publish</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>