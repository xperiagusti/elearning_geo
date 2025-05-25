<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarBerita";?>">berita</a></div>
                <div class="breadcrumb-item">edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Berita</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" <?php echo form_open_multipart('search/post_func');?><br>
                                <input type="hidden" name="id" value="<?= $berita['id_berita'];?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul
                                        Berita</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="judul_berita"
                                            value="<?php echo $berita['judul_berita'];?>">
                                        <small class="form-text text-danger"><?= form_error('judul_berita');?></small>
                                    </div>
                                </div>

                                <!-- <div class="form-group row mb-4">
						 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Highlight Berita</label>
							<div class="col-sm-12 col-md-7">
							<img src="<?= base_url('upload/berita/' . $berita['foto_berita']); ?>" width="250px" height="120px" />
							
							<input type="file" class="form-control-file" name="foto_berita" accept=".jpg,.png,.jpeg">
							</div>
						 </div> -->

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Highlight
                                        Berita</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="foto_berita" id="image-upload"
                                                accept=".jpg,.png,.jpeg" />
                                            <img src="<?= base_url('upload/berita/' . $berita['foto_berita']); ?>"
                                                width="250px" height="250px" alt="Preview Image" id="preview-image">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">kategori</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="kategori"
                                            value="<?php echo $berita['kategori'];?>">
                                        <small class="form-text text-danger"><?= form_error('kategori');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote"
                                            name="isi_berita"><?php echo $berita['isi_berita'];?></textarea>
                                        <small class="form-text text-danger"><?= form_error('isi_berita');?></small>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" name="edit">Edit</button>
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

<script>
    function previewImage() {
        var preview = document.getElementById("preview-image");
        var fileInput = document.getElementById("image-upload");
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = "block";
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = "none";
        }
    }

    document.getElementById("image-upload").addEventListener("change", previewImage);
</script>
