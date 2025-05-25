<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarUser";?>">User</a></div>
              <div class="breadcrumb-item">Tambah</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Tambah User</h4>
                    </div>
                    <div class="card-body">
                      <form action="" method="post">

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Depan</label>
                        <div class="col-sm-12 col-md-7">
                        <input id="nama_depan" type="text" class="form-control" name="nama_depan" autofocus value="<?= set_value('nama_depan'); ?>">
                        <small class="form-text text-danger"><?= form_error('nama_depan'); ?></small>
                        </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Belakang </label>
                        <div class="col-sm-12 col-md-7">
                        <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="<?= set_value('nama_belakang'); ?>">
                        <small class="form-text text-danger"><?= form_error('nama_belakang'); ?></small>
                        </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                        <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="role_id" value="<?= set_value('role_id'); ?>">>
                          <option value="1">Admin</option>
                          <option value="2">Siswa</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('nama_belakang'); ?></small>
                        </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email </label>
                        <div class="col-sm-12 col-md-7">
                        <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
                        <small class="form-text text-danger"><?= form_error('password1'); ?></small>
                        </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input id="password2" type="password" class="form-control" name="password2">
                        </div>
                        </div>

                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Register</button>
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