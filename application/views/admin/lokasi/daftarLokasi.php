<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarLokasi";?>">Lokasi</a></div>
                <div class="breadcrumb-item">Daftar</div>
            </div>
        </div>
        <!-- session flashdata untuk sukses menambah lokasi  -->
        <?php if($this->session->flashdata('flashTambah')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    lokasi<strong> berhasil </strong> <?= $this->session->flashdata('flashTambah');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- session flashdata untuk sukses menghapus lokasi  -->
        <?php if($this->session->flashdata('flashHapus')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    lokasi<strong> berhasil </strong> <?= $this->session->flashdata('flashHapus');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- session flashdata untuk sukses mengubah lokasi  -->
        <?php if($this->session->flashdata('flashUbah')) : ?>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    lokasi<strong> berhasil</strong> <?= $this->session->flashdata('flashUbah');?>
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
                                <h4>Daftar Lokasi</h4>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-info btn-md" href="<?php echo base_url(); ?>admin/lokasi_bencana/tambah"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Bencana</th>
                                            <th>Tahun Kejadian</th>
                                            <th>Bulan Kejadian</th>
                                            <th>Provinsi</th>
                                            <th>Kota</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach($lokasi as $a):?>
                                        <tr>
                                            <td><?= $i;?></td>
                                            <td><?= $a['judul_bencana'];?>
                                            </td>
                                            <td><?= $a['tahunBencana'];?></td>
                                            <td><?= $a['bulanBencana'];?></td>
                                            <td><?= $a['provinsiBencana'];?></td>
                                            <td><?= $a['kotaBencana'];?></td>
                                            <td><?= $a['keteranganBencana'];?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/editLokasi/<?= $a['idBencana'];?>"
                                                    class="btn btn-primary btn-md"><i class="fas fa-edit"></i></a>
                                                <a href="<?php echo base_url(); ?>admin/hapusLokasi/<?= $a['idBencana'];?>"
                                                    class="btn btn-danger btn-md"
                                                    onclick=" return confirm('Apakah anda yakin menghapus lokasi ini ?')"><i
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