<?php
session_start();
include "../koneksi/koneksi.php";

$user = $_SESSION['NamaUser'];
if ($_SESSION['NamaUser']=="") {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Petugas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/bootstrap.min.css">
    <script src="../bootstrap-5.3.2-dist/jquery.min.js"></script>
    <script src="../bootstrap-5.3.2-dist/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 860px}
        
        
        /* Set gray background color and 100% height */
        .sidenav {
            background-color: teal;
            height: 100%;
        }
            
        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
        .row.content {height: auto;} 
        }
    </style>
</head>
<body style="background-color: white">

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h1 style="color: white"><?php echo  $_SESSION ['Level']; ?></p></h1>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="index.php" style="color:black">Dashboard</a></li>
        <li><a href="?page=stok" style="color:black">Stok</a></li>
        <li><a href="?page=user" style="color:black">User</a></li>
        <li><a href="logout.php" style="color:black">Log Out</a></li>
      </ul><br>
    </div>
    <br>

    <div class="col-sm-9">
      <?php 
      if (isset($_GET['page'])) {
        $laman = $_GET['page'];

        switch ($laman) {
          case 'user';
          include "user.php";
          break;

          case 'stok';
          include "stok-brg.php";
          break;
          
          case 'logout';
          include "logout.php";
          break;

          case 'tambah-barang';
          include "tambah-barang.php";
          break;

          case 'cari-barang';
          include "cari-barang.php";
          break;


          case 'tambah-user';
          include "tambah-user.php";
          break;

          case 'edit-user';
          include "edit-user.php";
          break;

          case 'edit-brg';
          include "edit-brg.php";
          break;

          case 'hapus-user';
          include "hapus-user.php";
          break;

          case 'hapus-brg';
          include "hapus-brg.php";
          break;
          default:
          # code...
          break;
        }
      }
      else {
        include "dashboard.php";
      }
      ?>
     </div>
  </div>
</div>

</body>
</html>
