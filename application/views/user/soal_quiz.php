<style>
#timer_place {
    margin: 0 auto;
    text-align: center;
}

#counter {
    border-radius: 7px;
    border: 2px solid gray;
    padding: 7px;
    font-size: 2em;
    font-weight: bolder;
}


</style>

<?php

if(isset($_SESSION["waktu_start"])){
    $lewat = time() - $_SESSION["waktu_start"];
}else{
    $_SESSION["waktu_start"] = time();
    $lewat = 0;
}

?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Good luck, <?php echo $user['nama_depan']; ?> <?php echo $user['nama_belakang']; ?></h1>
        </div>

        <div class="section-body" id="konten">
            <div class="row">
                <!-- <div class="col-lg-3">
                    <div class="card">

                        <div class="card-body text-center">
                            <h5>Timer</h5>
                            <span id="counter" align="center"></span>
                        </div>

                    </div>
                </div> -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bacalah soal dengan hati-hati</h4>
                        </div>
                        <div class="card-body">
                            <form id="formSoal" role="form" action="<?php echo base_url(); ?>user/jawab_aksi"
                                method="post" onsubmit="return confirm('Anda Yakin ?')">

                                <input type="hidden" name="id_peserta" value="<?php echo $id['id_peserta']; ?>">
                                <input type="hidden" name="jumlah_soal" value="<?php echo $total_soal; ?>">

                                <?php $no = 0;
                                foreach ($soal as $s) {
                                    $no++ ?>
                                <div class="form-group">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                
                                                <td><span class="mt-2 mb-2 badge badge-light"><b>Soal No. <?php echo $no; ?> </b></span><br>
                                                    <?php echo $s->pertanyaan; ?>
                                                    <input type='hidden' name='soal[]'
                                                        value='<?php echo $s->id_soal_ujian; ?>' />
                                                     <input type="hidden" name="jawaban[<?php echo $s->id_soal_ujian; ?>]"
                                                        value="A" required />
                                                    <input type="hidden" name="jawaban[<?php echo $s->id_soal_ujian; ?>]"
                                                        value="B" required /> 
                                                    <input type="hidden" name="jawaban[<?php echo $s->id_soal_ujian; ?>]"
                                                        value="C" required /> 
                                                    <input type="hidden" name="jawaban[<?php echo $s->id_soal_ujian; ?>]"
                                                        value="D" required /> 
                                                    <input type="hidden" name="jawaban[<?php echo $s->id_soal_ujian; ?>]"
                                                        value="E" required />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-primary">Selesai</button>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>


        </div>

</div>




</section>
</div>




<script type="text/javascript">
function waktuHabis() {
    alert('Waktu Anda telah habis, Jawaban anda akan disimpan secara otomatis.');
    var formSoal = document.getElementById("formSoal");
    formSoal.submit();
}

function hampirHabis(periods) {
    if ($.countdown.periodsToSeconds(periods) == 60) {
        $(this).css({
            color: "red"
        });
    }
}
$(function() {
    var waktu = '<?= $max_time; ?>';
    var sisa_waktu = waktu - <?php echo $lewat ?>;
    var longWayOff = sisa_waktu;
    $("#counter").countdown({
        until: longWayOff,
        compact: true,
        onExpiry: waktuHabis,
        onTick: hampirHabis
    });
});


// window.location.hash="no-back-button";
// window.location.hash="Again-No-back-button";
// window.onhashchange=function(){window.location.hash="no-back-button";}


</script>