<div class="row well">
        <div class="col-md-4">
            <div class="card well">
                <div class="card-header">
                    
              <form action="" class="form-signin" method="post" enctype="multipart/form-data"> 
              <h3 class="" style="color:teal">Tambah Barang</h3>
                <div class="card-body">
                  <form action="" method="post">
                    <div class="mb-3 mt-3">
                    <table for="" class="form-label">id</table>
                      <input type="number" name="ProdukID" class="form-control" require autofocus>
                    </div>
                    <div class="mb-3 mt-3">
                      <table for="" class="form-label">Nama</table>
                      <input type="text" name="NamaProduk" class="form-control" require autofocus>
                    </div>
                    <div class="mb-3 mt-3">
                      <table for="" class="form-label">Harga</table>
                      <input type="number" name="Harga" class="form-control" require autofocus >
                    </div>
                    <div class="mb-3 mt-3">
                    <table for="" class="form-label">stok</table>
                      <input type="number" name="Stok" class="form-control" require autofocus>
                    </div>
                    <div class="mb-3">
                            <label for="foto" class="form-label">Foto<span style="color: red;"> *</span></label>
                            <input type="file" class="form-control" id="foto" name="foto" required>
                            <p style="color: red;">Hanya bisa menginput foto dengan ekstensi PNG, JPG, JPEG, SVG</p>
                     </div>
                    
                      <button name="tambah" class="btn btn-primary">Tambah Data</button>
                      
                    </div> 
                  </form>
                  <?php

if (isset($_POST['tambah'])) {
  $id = $_POST['ProdukID'];
  $nama = $_POST['NamaProduk'];
  $harga = $_POST['Harga'];
  $stok = $_POST['Stok'];

  $target = "../foto/";
  $time = date('dmYHis');
  $type = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
  $targetfile = $target . $time . '.' . $type;
  $filename = $time . '.' . $type;
  
  $uploadOk = 1;

  if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetfile)) {
      $sql = "INSERT INTO produk (ProdukID, NamaProduk, Harga, Stok, foto) VALUES ('$id','$nama', '$harga', '$stok', '$filename')";
      if ($koneksi->query($sql) === TRUE) {
          echo "<script>alert('Berhasil menambahkan produk');window.location.href='?page=stok';</script>";
          exit();
      } else {
          echo "Error: " . $sql . "<br>" . $koneksi->error;
      }
  } else {
      echo "Maaf, terjadi kesalahan saat mengupload file gambar.";
  }

  $koneksi->close();
}

?>
