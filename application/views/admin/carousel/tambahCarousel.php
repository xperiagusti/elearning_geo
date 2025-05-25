<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Admin</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?php echo base_url() . "admin/"; ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?php echo base_url() . "admin/daftarCarousel"; ?>">Poster</a></div>
        <div class="breadcrumb-item">Tambah</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Poster</h4>
            </div>
            <div class="card-body">
              <form action="" method="post" <?php echo form_open_multipart('search/post_func'); ?><br>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul Poster</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control" name="judul_carousel" value="<?= set_value('judul_carousel '); ?>">
                    <small class="form-text text-danger"><?= form_error('judul_carousel'); ?></small>
                  </div>
                </div>

                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Poster </label>
                  <div class="col-sm-12 col-md-7">
                    <p style="color: red;"><i class="fas fa-info-circle"> Rekomendasi Size 1366x768 </i> </p>
                    <input type="file" class="form-control-file" name="foto_carousel" accept=".jpg,.png,.jpeg">
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