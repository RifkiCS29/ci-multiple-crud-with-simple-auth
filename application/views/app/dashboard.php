<?php $this->load->view('app/_layouts/header'); ?>
<?php $this->load->view('app/_layouts/sidebar'); ?>
<?php $nama_lengkap = $this->session->userdata('nama_lengkap');?>

<div class="col-md-12 u-p-zero">

 <div class="c-card c-card--responsive h-100vh u-p-zero">
  <div class="c-card__header c-card__header--transparent o-line">
   <?php echo APP_NAME; ?>
  </div>
  <div class="c-card__body">

   <div class="c-table-responsive">
    <h1>Selamat Datang, <?= $nama_lengkap ?></h1>
   </div>

  </div>
 </div>
</div>

<?php $this->load->view('app/_layouts/footer'); ?>
