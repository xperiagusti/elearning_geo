<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarKonten";?>">Konten</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah konten</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" <?php echo form_open_multipart('search/post_func');?><br>
                                <input type="hidden" name="author" value="<?php echo $user['nama_depan'];?>">

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul
                                        konten</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="judul_konten"
                                            value="<?= set_value('judul_konten'); ?>">
                                        <small class="form-text text-danger"><?= form_error('judul_konten');?></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori
                                        konten</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="kategori" class="form-control select2">
                                            <?php foreach ($bencana as $a): ?>
                                            <option value="<?= $a["id_bencana"] ?>"><?= $a["judul_bencana"] ?></option>
                                            <?php endforeach;
                                            ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('kategori');?></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote"
                                            name="isi_konten"> <?= set_value('isi_konten'); ?> </textarea>
                                        <small class="form-text text-danger"><?= form_error('isi_konten');?></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar
                                        Konten</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="foto_konten" id="image-upload"
                                                accept=".jpg,.png,.jpeg" />
                                        </div>
                                    </div>
                                </div>


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