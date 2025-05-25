<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hai, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?></h1>
        </div>


        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 mb-2">
                                    <select class="form-control" id="selectTahun">
                                        <option value="">Pilih Tahun</option>
                                        <!-- <?php foreach ($lokasi as $a): ?>
                                        <option value="<?= $a["tahunBencana"] ?>"><?= $a["tahunBencana"] ?></option>
                                        <?php endforeach;?> -->
                                        <?php
                                        $tahunBencana = array_column($lokasi, 'tahunBencana');
                                        $tahunBencana = array_unique($tahunBencana);
                                        foreach ($tahunBencana as $tahun):
                                        ?>
                                        <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <select class="form-control" id="selectBulan">
                                        <option value="">Pilih Bulan</option>
                                        <!-- <?php foreach ($lokasi as $a): ?>
                                        <option value="<?= $a["bulanBencana"] ?>"><?= $a["bulanBencana"] ?></option>
                                        <?php endforeach;?> -->
                                        <?php
                                        $bulanBencana = array_column($lokasi, 'bulanBencana');
                                        $bulanBencana = array_unique($bulanBencana);
                                        foreach ($bulanBencana as $bulan):
                                        ?>
                                        <option value="<?= $bulan ?>"><?= $bulan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <select class="form-control" id="selectProvinsi">
                                        <option value="">Pilih Provinsi</option>
                                        <!-- <?php foreach ($lokasi as $a): ?>
                                        <option value="<?= $a["provinsiBencana"] ?>"><?= $a["provinsiBencana"] ?>
                                        </option>
                                        <?php endforeach;?> -->
                                        <?php
                                        $provinsiBencana = array_column($lokasi, 'provinsiBencana');
                                        $provinsiBencana = array_unique($provinsiBencana);
                                        foreach ($provinsiBencana as $provinsi):
                                        ?>
                                        <option value="<?= $provinsi ?>"><?= $provinsi ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <select class="form-control" id="selectKota">
                                        <option value="">Pilih Kota</option>
                                        <!-- <?php foreach ($lokasi as $a): ?>
                                        <option value="<?= $a["kotaBencana"] ?>"><?= $a["kotaBencana"] ?></option>
                                        <?php endforeach;?> -->
                                        <?php
                                        $kotaBencana = array_column($lokasi, 'kotaBencana');
                                        $kotaBencana = array_unique($kotaBencana);
                                        foreach ($kotaBencana as $kota):
                                        ?>
                                        <option value="<?= $kota ?>"><?= $kota ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-1 mb-2">
                                    <button type="button" class="btn btn-primary"
                                        onclick="filterMarkers()">Filter</button>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div id="map" style=" position: relative;height: 450px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <article class="article article-style-c">
                        <div class="article-details">
                            <div class="article-category"><a href="#"><?php echo $konten['kategori'];?></a>
                                <div class="bullet"></div> <a
                                    href="#"><?= date('d F Y', strtotime($konten['tgl_posting'])); ?></a>
                            </div>
                            <div class="article-title mt-3 mb-3">
                                <p><a href="" style="font-size:20px"> <?php echo $konten['judul_konten'];?></a>
                                </p>
                            </div>
                            <p><?php echo $konten['isi_konten'];?></p>

                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
var map = L.map('map');
var bounds = L.latLngBounds([5.8713, 95.3169], [-10.9417, 141.0195]); // Koordinat batas wilayah Indonesia
map.fitBounds(bounds);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18
}).addTo(map);


    var mapLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(map);

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
});

    var detail = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
		maxZoom: 17,
        attribution: 'Map data: {attribution.OpenStreetMap}, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
	});

    var baseLayers = {
    "Default": mapLayer,
    "World Imagery": Esri_WorldImagery,
    "Terrain": detail
    };

    L.control.layers(baseLayers).addTo(map);

var data = [
    <?php foreach ($lokasi as $a) { ?> {
        "nama": "<?= $a['judul_bencana'];?>",
        "tahun": "<?= $a['tahunBencana'];?>",
        "bulan": "<?= $a['bulanBencana'];?>",
        "provinsi": "<?= $a['provinsiBencana'];?>",
        "kota": "<?= $a['kotaBencana'];?>",
        "keterangan": "<?= $a['keteranganBencana'];?>",
        "latitude": "<?= $a['latitudeBencana'];?>",
        "longitude": "<?= $a['longitudeBencana'];?>",
        "lokasi": "<?= $a['lokasiBencana'];?>",
        "icon": "<?= base_url('upload/bencana/' . $a['foto_bencana']); ?>"
    },
    <?php } ?>
];

var markers = []; // Menyimpan marker yang telah dibuat

for (var i = 0; i < data.length; i++) {
    var markerData = data[i];

    // Buat icon khusus untuk marker
    var customIcon = L.icon({
        iconUrl: markerData.icon,
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });

    // Buat marker dan tambahkan ke peta
    var marker = L.marker([markerData.latitude, markerData.longitude], {
            icon: customIcon
        })
        .addTo(map)
        .bindPopup(`
  <table>
    <tr>
      <td>Bencana</td>
      <td>: ${markerData.nama}</td>
    </tr>
    <tr>
      <td>Tahun:</td>
      <td>: ${markerData.tahun}</td>
    </tr>
    <tr>
      <td>Bulan:</td>
      <td>: ${markerData.bulan}</td>
    </tr>
    <tr>
      <td>Provinsi:</td>
      <td>: ${markerData.provinsi}</td>
    </tr>
    <tr>
      <td>Kota:</td>
      <td>: ${markerData.kota}</td>
    </tr>
    <tr>
      <td>Keterangan</td>
      <td>: ${markerData.keterangan}</td>
    </tr>
  </table>
`);


    markers.push(marker);
}

function filterMarkers() {
    var selectedTahun = document.getElementById('selectTahun').value;
    var selectedBulan = document.getElementById('selectBulan').value;
    var selectedProvinsi = document.getElementById('selectProvinsi').value;
    var selectedKota = document.getElementById('selectKota').value;
    // var selectedNamaBencana = document.getElementById('selectNamaBencana').value;

    for (var i = 0; i < markers.length; i++) {
        var marker = markers[i];
        var markerData = data[i];

        if (
            (selectedTahun === "" || markerData.tahun === selectedTahun) &&
            (selectedBulan === "" || markerData.bulan === selectedBulan) &&
            (selectedProvinsi === "" || markerData.provinsi === selectedProvinsi) &&
            (selectedKota === "" || markerData.kota === selectedKota)
        ) {
            marker.addTo(map);
        } else {
            marker.removeFrom(map);
        }
    }
}
</script>