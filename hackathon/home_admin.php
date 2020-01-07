<?php
ob_start();
require_once('config/koneksi.php');
require_once('models/database.php');

$connection = new Database($host, $user, $pass, $database);
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bank Sampah Asoka</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  </head>

  <body>

    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['status']=="bsdjka"){
      header("location:index.php?pesan=gagalooyyyyy");
    }

    ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Bank Sampah Asoka</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Warga <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=nasabah">Data Nasabah</a></li>
                <li><a href="?page=pengurus">Data Pengurus</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Sampah <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=sampah">Nama sampah</a></li>
                <li><a href="?page=jenis_sampah">Jenis Sampah</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Transaksi <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=pembelian">Data Pembelian</a></li>
                <li><a href="?page=penjualan">Data Penjualan</a></li>
                <li><a href="?page=penarikan">Data Penarikan</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'];?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-gear"></i> Ganti password</a></li>
                <li class="divider"></li>
                <li><a href="models/user/proses_logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <script src="assets/js/jquery-1.10.2.js"></script>
      <div id="page-wrapper">

        <?php
        if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
          include "views/dashboard.php";
        } else if (@$_GET['page'] == 'nasabah') {
          include "views/nasabah.php";
        } else if (@$_GET['page'] == 'pengurus') {
          include "views/pengurus.php";
        } else if (@$_GET['page'] == 'sampah') {
          include "views/sampah.php";
        } else if (@$_GET['page'] == 'jenis_sampah') {
          include "views/jenis_sampah.php";
        } else if (@$_GET['page'] == 'pembelian') {
          include "views/pembelian.php";
        } else if (@$_GET['page'] == 'view_pembelian') {
          include "views/transaksi/view_pembelian.php";
        } else if (@$_GET['page'] == 'penjualan') {
          include "views/penjualan.php";
        } else if (@$_GET['page'] == 'view_penjualan') {
          include "views/transaksi/view_penjualan.php";
        } else if (@$_GET['page'] == 'proses_catatan') {
          include "views/proses_catatan.php";
        } else if (@$_GET['page'] == 'proses_catatan_penjualan') {
          include "models/transaksi/proses_catatan_penjualan.php";
        }else if (@$_GET['page'] == 'penarikan') {
          include "views/penarikan.php";
        }
         ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
    // $(document).ready(function(){
    //   $('#datatables').DataTable();
    // });
    $(document).ready( function () {
      $('#datatables').DataTable();
    } );
    </script>

  </body>
</html>
