	<footer class="main-footer" >
        <div class="text-center">Copyright &copy; <?= date('Y'); ?>
					<div class="bullet"></div>
					DISASTER.CO</div>
        <div class="footer-right">
          
        </div>
  </footer>
    </div>
  </div>
  


  <!-- General JS Scripts -->

  
  <script src="<?php echo base_url();?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url();?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url();?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="<?php echo base_url();?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url();?>assets/modules/summernote/summernote2.js"></script>
	<script src="<?php echo base_url();?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
	<script src="<?php echo base_url();?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
	<script src="<?php echo base_url();?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/page/modules-ion-icons.js"></script>
  <!-- Page Image Prieview -->

  <?php
  if ($this->uri->segment(2) == "berita" || $this->uri->segment(2) == "jenis_bencana") { ?>
   <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <?php
  } ?>

  <script src="<?php echo base_url(); ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/page/features-post-create.js"></script>

  <!-- Page Specific JS File -->
	<script src="<?php echo base_url();?>assets/js/page/index-0.js"></script>
	<script src="<?php echo base_url();?>assets/js/page/modules-datatables.js"></script>

  
  <!-- Template JS File -->
  <script src="<?php echo base_url();?>assets/js/page/bootstrap-modal.js"></script>
  <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>

  

</body>
</html>
