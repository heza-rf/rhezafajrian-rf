<?php 

        session_start();

        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

        $koneksi = new mysqli("localhost", "root", "", "dbpos");

        if ($_SESSION['admin'] || $_SESSION['penjual']) {
            header("location:index.php");          
        }else {

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UMKM Point Of Sale | Log in</title>
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

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="login.php"><b>UMKM</b>Point Of Sale</a>
    </div>
        
        <div class="login-box-body">
            
                <form id="sign_in" method="POST">
                    <p class="login-box-msg">Masukan Username dan password</p>
                                     

                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="nama" placeholder="Username" required autofocus>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    

                    <div class="row">
                        
                        <div class="col-xs-4">
                            <input type="submit" name="login" value="LOGIN" class="btn btn-primary btn-block btn-flat">
                        </div>
                    </div>
                    <br>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="register.php">Register Now!</a>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
 
 <?php 

    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $login = $_POST['login'];

    if ($login) {
        
        $sql = $koneksi->query("select * from tb_user where nama='$nama'and password='$password' ");

        $ketemu = $sql->num_rows;

        $data = $sql->fetch_assoc();

        if ($ketemu >=1) {
            session_start();

            if ($data['level'] == "admin") {
                $_SESSION['admin'] = $data[id_user];
                    header("location:index.php");
                
            }else if ($data['level'] == "penjual") {
                $_SESSION['penjual'] = $data[id_user];
                    header("location:index.php");
        }
        }else {
        
        ?>

                <script type="text/javascript">
                    
                    alert("Login Gagal Username dan Password salah !");
                </script>

        <?php

    }
    }


 ?>

 <?php 

        }

  ?>