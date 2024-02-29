<?php

include_once("../koneksi/koneksi.php");

if (isset($_POST['update'])) {
    $id = $_GET['ProdukID'];

    $NamaProduk = $_POST['NamaProduk'];
    $Harga = $_POST['Harga'];
    $Stok = $_POST['Stok'];
    $foto = $_POST['foto'];

    $result = mysqli_query($koneksi, "UPDATE produk SET NamaProduk='$NamaProduk', Harga='$Harga', Stok='$Stok', foto='$foto' WHERE ProdukID=$id");

    header("Location: index.php?page=stok");
    echo "<script>alert('Berhasil')</script>";
}

$id = $_GET['ProdukID'];

$result1 = mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID=$id");

while ($barang_data = mysqli_fetch_array($result1)) {
    $NamaProduk = $barang_data['NamaProduk'];
    $Harga = $barang_data['Harga'];
    $Stok = $barang_data['Stok'];
    $foto = $barang_data['foto'];
}
?>

<div class="row well">
    <div class="col-md-4">
        <div class="card well">
            <div class="card-header">
                <h3 class="" style="color:teal">Update barang</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                <div class="mb-3 mt-3">
                        <label for="nama" class="form-label">Nama Produk:</label>
                        <input type="text" class="form-control" id="NamaProduk" value="<?php echo $NamaProduk; ?>" placeholder="Masukkan Nama" name="NamaProduk">
                      </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga:</label>
                        <input type="text" class="form-control" id="Harga" value="<?php echo $Harga; ?>" placeholder="Masukkan Harga" name="Harga">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok:</label>
                        <input type="text" class="form-control" id="Stok" value="<?php echo $Stok; ?>" placeholder="Masukkan Stok" name="Stok">
                    </div>
                    <div class="mb-3">
                            <label for="foto" class="form-label">Foto<span style="color: red;"> *</span></label>
                            <input type="file" class="form-control" id="foto" value="<?php echo $foto; ?>" name="foto" required>
                            <p style="color: red;">Hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</p>
                     </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
