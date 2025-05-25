<style>
.carousel-item img {
    height: 100%;
    /* Bootstrap handles width already */
    object-fit: cover;
    /* or 'contain' if you want stretch instead of crop */
}

.info {
    padding: 6px 8px;
    font: 14px/16px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
}

.info h4 {
    margin: 0 0 5px;
    color: #777;
}

.legend {
    text-align: left;
    line-height: 18px;
    color: #555;
}

.legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin-right: 8px;
    opacity: 0.7;
}
</style>
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
                                <div class="col-md-2 mb-2">
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
                                <div class="col-md-2 mb-2">
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
                                <div class="col-md-2 mb-2">
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
                                <div class="col-md-2 mb-2">
                                    <select class="form-control" id="selectNamaBencana">
                                        <option value="">Pilih Bencana</option>
                                        <!-- <?php foreach ($lokasi as $a): ?>
                                        <option value="<?= $a["judul_bencana"] ?>"><?= $a["judul_bencana"] ?></option>
                                        <?php endforeach;?> -->
                                        <?php
                                        $judul_bencana = array_column($lokasi, 'judul_bencana');
                                        $judul_bencana = array_unique($judul_bencana);
                                        foreach ($judul_bencana as $judul):
                                        ?>
                                        <option value="<?= $judul ?>"><?= $judul ?></option>
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

                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php $first = true; ?>
                                    <?php foreach ($carousel as $item) : ?>
                                    <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                                        <img class="d-block w-100"
                                            src="<?php echo base_url('upload/carousel/' . $item['foto_carousel']); ?>"
                                            alt="Slide">
                                    </div>
                                    <?php $first = false; ?>
                                    <?php endforeach; ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleFade" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleFade" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets2/js/provinsi.js"></script>
<script>
var map = L.map('map');
var bounds = L.latLngBounds([5.8713, 95.3169], [-10.9417, 141.0195]); // Koordinat batas wilayah Indonesia
map.fitBounds(bounds);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18
}).addTo(map);

//     var mapLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
//     }).addTo(map);

//     var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
// 	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
// });

//     var detail = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
// 		maxZoom: 17,
//         attribution: 'Map data: {attribution.OpenStreetMap}, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
// 	});

//     var baseLayers = {
//     "Map": mapLayer,
//     "Esri_WorldImagery": detail
//     };

//     L.control.layers(baseLayers).addTo(map).setPosition('bottomleft');



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
    var selectedNamaBencana = document.getElementById('selectNamaBencana').value;

    for (var i = 0; i < markers.length; i++) {
        var marker = markers[i];
        var markerData = data[i];

        if (
            (selectedTahun === "" || markerData.tahun === selectedTahun) &&
            (selectedBulan === "" || markerData.bulan === selectedBulan) &&
            (selectedProvinsi === "" || markerData.provinsi === selectedProvinsi) &&
            (selectedKota === "" || markerData.kota === selectedKota) &&
            (selectedNamaBencana === "" || markerData.nama === selectedNamaBencana)
        ) {
            marker.addTo(map);
        } else {
            marker.removeFrom(map);
        }
    }
}


var BENCANA = <?=json_encode($jumlah)?>;
var TOTAL = <?=json_encode($total)?>;

// Peta Tematik
const info = L.control();

info.onAdd = function(map) {
    this._div = L.DomUtil.create('div', 'info');
    this.update();
    return this._div;
};

// info.update = function(props) {
//     this._div.innerHTML = '<h6>Jumlah Bencana Per Provinsi</h6>' +  (props ?
//         '<b>' + props.NAME_1 + '</b><br />' + (BENCANA[props.NAME_1] !== undefined ? BENCANA[props.NAME_1] + ' bencana' : '0 bencana')
//         : 'Dekatkan mouse untuk melihat');
// };

info.update = function(props) {
    this._div.innerHTML = '<h6>Jumlah Bencana Per Provinsi</h6>' + (props ?
        '<b>' + props.PROPINSI + '</b><br />' + (TOTAL[props.PROPINSI] !== undefined ? TOTAL[props.PROPINSI] + ' Bencana <br /><br/>' : 'Tidak Ada Bencana') + (BENCANA[props.PROPINSI] !== undefined ? getBencanaString(props.PROPINSI) : '')
        : 'Dekatkan mouse untuk melihat');
};


function getBencanaString(provinsi) {
    var bencanaData = BENCANA[provinsi];
    var bencanaString = '';

    for (var jenisBencana in bencanaData) {
        var jumlahBencana = bencanaData[jenisBencana];
        bencanaString += jenisBencana + ' : ' + jumlahBencana + '<br>';
    }

    return bencanaString;
}


info.addTo(map);

// get color depending on population density value
function getColor(d) {
    return d > 100 ? '#800026' :
        d > 50 ? '#E31A1C' :
        d > 10 ? '#FC4E2A' :
        d > 5 ? '#db8d21' : '#FFEDA0';
}

function style(feature) {
    return {
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.5,
        fillColor: getColor(TOTAL[feature.properties.PROPINSI])
    };
}

function highlightFeature(e) {
    const layer = e.target;

    layer.setStyle({
        weight: 2,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    layer.bringToFront();

    info.update(layer.feature.properties);
}

/* global statesData */
const geojson = L.geoJson(geojson_indonesia, {
    style,
    onEachFeature
}).addTo(map);

function resetHighlight(e) {
    geojson.resetStyle(e.target);
    info.update();
}

function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}

function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}




const legend = L.control({
    position: 'bottomright'
});

legend.onAdd = function(map) {

    const div = L.DomUtil.create('div', 'info legend');
    const grades = [0, 5, 10, 50, 100];
    const labels = [];
    let from, to;

    for (let i = 0; i < grades.length; i++) {
        from = grades[i];
        to = grades[i + 1];

        labels.push(`<i style="background:${getColor(from + 1)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`);
    }

    div.innerHTML = labels.join('<br>');
    return div;
};

legend.addTo(map);



</script>