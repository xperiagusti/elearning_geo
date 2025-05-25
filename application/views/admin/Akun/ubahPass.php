<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Password</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url() . "admin"; ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url() . "admin/daftarUser"; ?>">User</a></div>
                <div class="breadcrumb-item">Password</div>
            </div>
        </div>

        
<div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Ubah Password</h4>
                    </div>
                    <div class="card-body">
                      <?= $this->session->flashdata('message'); ?>
                      <form action="<?= base_url('Admin/changePass'); ?>" method="post">

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="current_password" new_password1>Current Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <small class="form-text text-danger"><?= form_error('current_password'); ?></small>
                        </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="new_password1">New Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <small class="form-text text-danger"><?= form_error('new_password1'); ?></small>
                        </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="new_password2">Confirm Password</label>
                        <div class="col-sm-12 col-md-7">
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <small class="form-text text-danger"><?= form_error('new_password2'); ?></small>
                        </div>
                        </div>
                        
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Ubah Password</button>
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