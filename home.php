<?php 

    $tgl = date("Y-m-d");

    $id_user = $_POST['user'];

    $sql = $koneksi->query("select * from tb_user where id_user='$user'");
    $data = $sql->fetch_assoc(); 



    $sql2 = $koneksi->query("select * from tb_transaksi, tb_barang where 
          tb_transaksi.kode_barcode=tb_barang.kode_barcode
          and tb_transaksi.id_user=tb_barang.id_user
          and tb_transaksi.id_user='$user'
          and tgl_transaksi");
    

    while ($tampil=$sql2->fetch_assoc()) {
      $profit = $tampil['profit']*$tampil['jumlah'];

      $total_pj = $total_pj+$tampil['total'];

      $total_profit = $total_profit+$profit;
    }


 ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small><?php echo $data['nama_toko']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>AYO</h3>

              <p>Melakukan Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?page=transaksi&kodepj=<?php echo $kode; ?> " class="small-box-footer">Mulai Berjualan <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>DB</h3>

              <p>Data Barang</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?page=barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo number_format($total_pj); ?><sup style="font-size: 20px"></sup></h3>

              <p>Penjualan Hari Ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo number_format($total_profit); ?></h3>

              <p>Keuntungan Hari Ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
