<!-- Main Content -->
<script type="text/javascript">
    $(function() {
        $(".datepicker").datepicker({
            format: 'dd MM yyyy',
            //   format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url() . "admin"; ?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url() . "admin/daftarUser"; ?>">User</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <div class="col-lg-10">
                                <h4>Setting Akun</h4>
                            </div>
                            <div class="col-lg-2">
                                        <a href="<?php echo base_url(); ?>admin/hapusUser/<?= $user['id']; ?>"
                                                    class="btn btn-danger btn-md"
                                                    onclick=" return confirm('Apakah anda yakin menghapus akun ini ?')"><i
                                                        class="fas fa-trash"></i> Hapus Akun</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" <?php echo form_open_multipart('search/post_func'); ?><br>
                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama depan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama_depan" value="<?php echo $user['nama_depan']; ?>">
                                        <small class="form-text text-danger"><?= form_error('nama_depan'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Belakang</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama_belakang" value="<?php echo $user['nama_belakang']; ?>">
                                        <small class="form-text text-danger"><?= form_error('nama_belakang'); ?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="email" value="<?php echo $user['email']; ?>">
                                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" name="edit">Edit</button>
                                        <!-- <button class="btn btn-primary" name="edit">Edit</button> -->
                                    </div>
                                    
                                    
                                </div>

                                <!-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" name="edit">Edit</button>
                                    </div>
                                </div> -->


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>