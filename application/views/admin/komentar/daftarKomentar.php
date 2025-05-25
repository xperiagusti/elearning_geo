<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarKomentar Siswa";?>">Komentar Siswa</a></div>
                <div class="breadcrumb-item">Daftar</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-10">
                                <h4>Daftar Komentar Siswa</h4>
                            </div>
                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Komentar</th>
                                            <th>Tanggal Posting</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;?>
                                        <?php foreach($komentar as $a):?>
                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?= $a['author'];?></td>
                                            <td style="max-width:150px"><?php echo character_limiter($a['keterangan'], 140); ?>
                                            </td>
                                            <td><?= date('d/m/Y H:i:s',strtotime($a['tgl_posting'])); ?></td>
                                            <td>
                                                <button
                                                    class="btn btn-primary btn-md modal-button" data-komentar="<?= strip_tags($a['keterangan']); ?>"><i
                                                        class="fa fa-eye"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Konten Modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Komentar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Tempatkan konten komentar di sini -->
                <p id="komentar-body"></p>
            </div>
           
        </div>

    </div>
</div>

<script>
$(document).ready(function(){
    // Menampilkan modal ketika tombol diklik
    $(".modal-button").click(function(){
        // Mengambil nilai atribut data-komentar
        var komentar = $(this).data('komentar');
        
        // Memasukkan nilai komentar ke dalam modal body
        $("#komentar-body").text(komentar);
        
        // Menampilkan modal
        $("#myModal").modal();
    });
});
</script>



