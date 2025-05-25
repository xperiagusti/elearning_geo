<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?php echo base_url()."admin";?>">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="<?php echo base_url()."admin/daftarLokasi";?>">Lokasi</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah lokasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" <?php echo form_open_multipart('search/post_func');?><br>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis 
                                        bencana</label>
                                    <div class="col-sm-12 col-md-7">
                                    <select name="id_bencana" class="form-control select2">
                                        <?php foreach ($bencana as $a): ?>
                                            <option value="<?= $a["id_bencana"] ?>"><?= $a["judul_bencana"] ?></option>
                                        <?php endforeach;
                                        ?>
                                    </select>
                                        <small class="form-text text-danger"><?= form_error('id_bencana');?></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Kejadian</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="tahunBencana"
                                            value="<?= set_value('tahunBencana'); ?>">
                                        <small class="form-text text-danger"><?= form_error('tahunBencana');?></small>
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan Kejadian</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2" name="bulanBencana">
                                            <?php foreach($bulan as $b) : ?>
                                                <option value="<?= $b;?>"><?= $b;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('bulanBencana');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                    <div class="col-sm-12 col-md-7">
                                    <select class="form-control select2" name="provinsiBencana" id="provinsi">
                                            <!-- Opsi Provinsi akan diisi melalui JavaScript -->
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('provinsiBencana');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2" name="kotaBencana" id="kota">
                                            <!-- Opsi Provinsi akan diisi melalui JavaScript -->
                                        </select>
                                        <small class="form-text text-danger"><?= form_error('kotaBencana');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="keteranganBencana"
                                            value="<?= set_value('keteranganBencana'); ?>">
                                        <small class="form-text text-danger"><?= form_error('keteranganBencana');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="lokasiBencana"
                                            value="<?= set_value('lokasiBencana'); ?>">
                                        <small class="form-text text-danger"><?= form_error('lokasiBencana');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Latitude</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control" name="latitudeBencana" id="latitudeBencana"
                                            value="" readonly>
                                        <small class="form-text text-danger"><?= form_error('latitudeBencana ');?></small>
                                    </div>
                                    <label
                                        class="col-form-label text-md-left col-12 col-md-1 col-lg-1">Lngitude</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" class="form-control" name="longitudeBencana" id="longitudeBencana"
                                            value="" readonly>
                                        <small class="form-text text-danger"><?= form_error('longitudeBencana ');?></small>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tandai Peta</label>
                                    <div class="col-sm-12 col-md-7">
                                    <div id="map"></div>
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

<script>
   

    $(document).ready(function() {
        $('.select2').select2();

        // Mengambil data dari file JSON di URL GitHub
        $.getJSON('https://raw.githubusercontent.com/mtegarsantosa/json-nama-daerah-indonesia/master/regions.json', function(data) {
            // Mengisi opsi Provinsi
            var provinsiOptions = '<option value="">Pilih Provinsi</option>';

            $.each(data, function(index, item) {
                provinsiOptions += '<option value="' + item.provinsi + '">' + item.provinsi + '</option>';
            });

            $('#provinsi').html(provinsiOptions);

            // Mengisi opsi Kota berdasarkan pilihan Provinsi
            $('#provinsi').change(function() {
                var selectedProvinsi = $(this).val();
                var kotaOptions = '';
                $.each(data, function(index, item) {
                    if (item.provinsi === selectedProvinsi) {
                        $.each(item.kota, function(i, kota) {
                            kotaOptions += '<option value="' + kota + '">' + kota + '</option>';
                        });
                    }
                });
                $('#kota').html(kotaOptions);
            });
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([-6.1754, 106.8272], 7); // Koordinat untuk pusat peta dan tingkat zoom

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 18
        }).addTo(map);

        var marker;

        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker); // Hapus marker sebelumnya (jika ada)
            }
            marker = L.marker(e.latlng).addTo(map); // Tambahkan marker baru di titik yang diklik
            document.getElementById('latitudeBencana').value = e.latlng.lat; // Isi kolom latitude dengan latitude titik yang diklik
            document.getElementById('longitudeBencana').value = e.latlng.lng; // Isi kolom longitude dengan longitude titik yang diklik
        });
    </script>