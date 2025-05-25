<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/soalQuiz";?>">Soal</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit soal</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" <?php echo form_open_multipart('search/post_func');?><br>
                                <input type="hidden" name="id" value="<?= $quiz['id_soal_ujian'];?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Topik</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="id_konten" class="form-control select2">
                                            <?php foreach($konten as $a) : ?>
                                            <?php if($a['id_konten'] == $quiz['id_konten']):?>
                                            <option value="<?= $a['id_konten'];?>" selected><?= $a['judul_konten'];?>
                                            </option>
                                            <?php else : ?>
                                            <option value="<?= $a['id_konten'];?>"><?= $a['judul_konten'];?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('kategori');?></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pertanyaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote"
                                            name="pertanyaan"><?php echo $quiz['pertanyaan'];?></textarea>
                                        <small class="form-text text-danger"><?= form_error('isi_soal');?></small>
                                    </div>
                                </div>

                                <!-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban
                                        A</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="a"><?php echo $quiz['a'];?></textarea>
                                        <small class="form-text text-danger"><?= form_error('a');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban
                                        B</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="b"><?php echo $quiz['b'];?></textarea>
                                        <small class="form-text text-danger"><?= form_error('b');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban
                                        C</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="c"><?php echo $quiz['c'];?></textarea>
                                        <small class="form-text text-danger"><?= form_error('c');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban
                                        D</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="d"><?php echo $quiz['d'];?></textarea>
                                        <small class="form-text text-danger"><?= form_error('d');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jawaban
                                        E</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" name="e"><?php echo $quiz['e'];?></textarea>
                                        <small class="form-text text-danger"><?= form_error('e');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kunci
                                        Jawaban</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" name="kunci_jawaban">
                                            <option <?php if($quiz['kunci_jawaban']=='A'){echo "selected='selected'";} ?>>A
                                            </option>
                                            <option <?php if($quiz['kunci_jawaban']=='B'){echo "selected='selected'";} ?>>B
                                            </option>
                                            <option <?php if($quiz['kunci_jawaban']=='C'){echo "selected='selected'";} ?>>C
                                            </option>
                                            <option <?php if($quiz['kunci_jawaban']=='D'){echo "selected='selected'";} ?>>D
                                            </option>
                                            <option <?php if($quiz['kunci_jawaban']=='E'){echo "selected='selected'";} ?>>E
                                            </option>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('kunci_jawaban');?></small>
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