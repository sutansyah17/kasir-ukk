<?php
include("koneksi/koneksi.php");
include("header.php");


?>
<body>

<style>
  .main-content {
    margin-top: 60px;
  }
  .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .card {
        margin-bottom: 20px;
    }
</style>
<body style ="background-color: #cfe2ff">

    <nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:white">Pelanggan</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="color:yellow">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php" style="color:yellow">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <form class="d-flex" method="post">
                <input class="form-control me-2" type="search" placeholder="search..." aria-label="search" name="search">
                <button class="btn btn-outline-light" type="submit">Cari</button>
            </form>
        </div>
    </nav>

    <div class="main-content">
        <div class="card-container">
            <?php
            if(isset($_POST['search'])){
            $search = $_POST['search'];
            $sql = $koneksi->query("SELECT * FROM produk WHERE NamaProduk LIKE '%$search%'");
            while ($data= $sql->fetch_assoc()) { ?>
                <div class='card' style='width: 18rem; margin: 10px;'>
                
                    <?php echo "<img class='card-img-top' src='foto/" . $data['foto'] . "' width='230' height='250'>" ?>
                    <div class='card-body'>
                        <h5 class='card-title'><?php echo $data['NamaProduk']?></h5>
                        <p class='card-text'>Harga: RP.<?php echo number_format($data['Harga']) ?></p>
                        <p class='card-text'>Stok: <?php echo $data['Stok']?></p>
                        <a href='transaksi.php' class='btn btn-md btn-primary float-end'>Beli</a>
                    </div>
                
                </div>
                <?php
            }
            } else {
                $sql = $koneksi->query("SELECT * FROM produk ");
            while ($data= $sql->fetch_assoc()) { 
                ?>
                <div class='card' style='width: 18rem; margin: 10px;'>
                
                <?php echo "<img class='card-img-top' src='foto/" . $data['foto'] . "' width='230' height='250'>" ?>
                <div class='card-body'>
                    <h5 class='card-title'><?php echo $data['NamaProduk']?></h5>
                    <p class='card-text'>Harga: RP.<?php echo number_format($data['Harga']) ?></p>
                    <p class='card-text'>Stok: <?php echo $data['Stok']?></p>
                    <a href='transaksi.php' class='btn btn-md btn-primary float-end'>Beli</a>
            </div>
            </div>
            <?php
            }
            
        }
        ?>
        </div>
    </div>
</body>
