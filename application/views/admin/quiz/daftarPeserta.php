<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarQuiz";?>">Quiz</a></div>
                <div class="breadcrumb-item">Daftar</div>
            </div>
        </div>
        <!-- session flashdata untuk sukses menambah quiz  -->
        <?php if($this->session->flashdata('flashTambah')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    quiz<strong> berhasil </strong> <?= $this->session->flashdata('flashTambah');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- session flashdata untuk sukses menghapus quiz  -->
        <?php if($this->session->flashdata('flashHapus')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    quiz<strong> berhasil </strong> <?= $this->session->flashdata('flashHapus');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- session flashdata untuk sukses mengubah quiz  -->
        <?php if($this->session->flashdata('flashUbah')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    quiz<strong> berhasil</strong> <?= $this->session->flashdata('flashUbah');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-10">
                                <h4>Daftar Quiz</h4>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-info btn-md" href="<?php echo base_url(); ?>admin/quiz/tambahp"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Peserta</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th width="20%">Topik</th>
                                            <th>Status</th>
                                            <!-- <th>Nilai</th> -->
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach($quiz as $a):?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $a['nama_depan'];?> <?= $a['nama_belakang'];?></td>
                                            <td><?php echo character_limiter($a['topik'], 40); ?></td>
                                            <?php if ($a['status_quiz'] == 1): ?>
                                            <td><div class="badge badge-warning">Belum</div></td>
                                            <?php else: ?>
                                            <td><div class="badge badge-success">Sudah</div></td>
                                            <?php endif; ?>
                                            <!-- <td><?= $a['nilai'];?></td> -->



                                            <td>
                                                <?php if ($a['status_quiz'] == 1): ?>
                                                <a href="<?php echo base_url(); ?>admin/editPeserta/<?= $a['id_peserta'];?>"
                                                    class="btn btn-primary btn-md"><i class="fas fa-edit"></i></a>
                                                <?php endif; ?>
                                                <a href="<?php echo base_url(); ?>admin/hapusPeserta/<?= $a['id_peserta'];?>"
                                                    class="btn btn-danger btn-md"
                                                    onclick=" return confirm('Apakah anda yakin menghapus peserta ini ?')"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>