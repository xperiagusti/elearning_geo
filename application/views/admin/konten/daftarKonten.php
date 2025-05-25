<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarKonten";?>">Konten</a></div>
                <div class="breadcrumb-item">Daftar</div>
            </div>
        </div>
        <!-- session flashdata untuk sukses menambah konten  -->
        <?php if($this->session->flashdata('flashTambah')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    konten<strong> berhasil </strong> <?= $this->session->flashdata('flashTambah');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- session flashdata untuk sukses menghapus konten  -->
        <?php if($this->session->flashdata('flashHapus')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    konten<strong> berhasil </strong> <?= $this->session->flashdata('flashHapus');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- session flashdata untuk sukses mengubah konten  -->
        <?php if($this->session->flashdata('flashUbah')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    konten<strong> berhasil</strong> <?= $this->session->flashdata('flashUbah');?>
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
                                <h4>Daftar Konten</h4>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-info btn-md" href="<?php echo base_url(); ?>admin/konten/tambah"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Konten</th>
                                            <th>Kategori</th>
                                            <th>Author</th>
                                            <th>Tanggal Posting</th>
                                            <th>Tanggal Edit</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach($konten as $a):?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?php echo character_limiter($a['judul_konten'], 40); ?>
                                            </td>
                                            <td><?= $a['kategori'];?></td>
                                            <td><?= $a['author'];?></td>
                                            <td><?= date('d/m/Y H:i:s',strtotime($a['tgl_posting'])); ?></td>
                                            <?php if (!empty($a['tanggal_edit'] != '0000-00-00 00:00:00')): ?>
                                            <td><?= date('d/m/Y H:i:s',strtotime($a['tanggal_edit'])); ?></td>
                                            <?php else: ?>
                                            <td>-</td>
                                            <?php endif; ?>


                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/editKonten/<?= $a['id_konten'];?>"
                                                    class="btn btn-primary btn-md"><i class="fas fa-edit"></i></a>
                                                <a href="<?php echo base_url(); ?>admin/hapusKonten/<?= $a['id_konten'];?>"
                                                    class="btn btn-danger btn-md"
                                                    onclick=" return confirm('Apakah anda yakin menghapus konten ini ?')"><i
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