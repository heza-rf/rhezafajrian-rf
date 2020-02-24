<?php 

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $koneksi = new mysqli("localhost", "root", "", "dbpos");


 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UMKM Point Of Sale | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>LTE</b>Point Of Sale</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registration Form</p>

    <form enctype="multipart/form-data" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="nama" class="form-control" placeholder="Nama" required="" />
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required="" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="nama_toko" class="form-control" placeholder="Nama Toko Anda" required="" />
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="number" name="no_hp" class="form-control" placeholder="No HP" required="" />
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" required="" /></textarea> 
        <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          
          <input type="submit" name="simpan" value="Daftar" class="btn btn-primary btn-block btn-flat">
        </div>
        <!-- /.col -->
      </div>
    </form>
<br>
    

    <a href="login.php" class="text-center">Sudah Mempunyai Akun !</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>

</body>
</html>

  <?php 

        if (isset($_POST['simpan'])) {
            
            
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $nama_toko = $_POST['nama_toko'];
            $no_hp = $_POST['no_hp'];
            $alamat = $_POST['alamat'];
            $password = $_POST['password'];
            
          
            

            $sql = $koneksi->query("insert into tb_user (nama, email, nama_toko, no_hp, alamat, password) values('$nama', '$email', '$nama_toko', '$no_hp', '$alamat', '$password')");

            if ($sql) {
                ?> 

                    <script type="text/javascript">
                        alert("Registrasi Berhasil");
                        window.location.href="login.php";
                    </script>

                <?php  
            }
        

        }
     ?>
