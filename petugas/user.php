<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title" style="color: teal">User</h4>
                <h4 class="card-title" style="color: teal">Daftar Pengguna</h4>
                        <?php 
                        if ($_SESSION['Level'] == "Administrator") {
                        ?>
                        <a href="?page=tambah-user" class="btn btn-primary btn-sm">Tambah User</a>
                        <?php
                        }
                        ?>
                    <p class="card-description">
                    </p>
                </p>
                <table class="table table-striped table-bordered">
                    <thead>
                
                <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Level</th>
                                        <?php if ($_SESSION['Level'] == "Administrator") { ?>
                                        <th>Pilihan</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no = 1;
                                    $sql = $koneksi->query("SELECT * FROM user");
                                    while ($data= $sql->fetch_assoc()) {
                                        
                                ?>
                                <tr>
                                    <tbody>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['NamaUser']; ?></td>
                                    <td><?php echo $data['Password']; ?></td>
                                    <td><?php echo $data['Level']; ?></td>
                                    <?php if ($_SESSION['Level'] == "Administrator") { ?>
                                    <td><a type='button' href='?page=edit-user&UserID=<?= $data['UserID']; ?>' class='btn btn-sm btn-warning'>Edit</a>/<a type='button' href='?page=hapus-user&UserID=<?= $data['UserID']; ?>' class='btn btn-sm btn-danger'>Delete</a></td>
                                    <?php } ?>
                                    </tbody>
                                </tr>
                                <?php } ?>
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                       

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   
</div>
