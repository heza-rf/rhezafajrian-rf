
<form method="POST" action="page/laporan/cetak.php?tgl_awal=<?php echo $tgl_awal; ?>&tgl_akhir=<?php echo $tgl_akhir; ?>">
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Laporan</h3>
    </div>
    <div class="box-body">
      <!-- Date -->
      <div class="form-group">
        <label>Dari:</label>

        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="date" name="tgl_awal" class="form-control pull-right">
        </div>
        <!-- /.input group -->
      </div>
      <!-- /.form group -->

      <!-- Date range -->
      <div class="form-group">
        <label>Sampai:</label>

        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="date" name="tgl_akhir" class="form-control pull-right">
        </div>
        <!-- /.input group -->
      </div>
           <input type="submit" name="cari" value="Simpan" class="btn btn-primary">
    </div>
    <!-- /.box-body -->
  </div>
</div>

