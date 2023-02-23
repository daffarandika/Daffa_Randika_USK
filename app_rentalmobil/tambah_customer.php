<?php
include 'conn.php';
include 'header.php';
$username = $_SESSION['username'];
if($username == ""){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Customer</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header bg-primary">Tambah</div>
            <div class="card-body">
            <form action="p_tambah_customer.php" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php if($username!="admin"){echo $username;}?>" <?php if($username!="admin"){echo "readonly";}?>>

                <label for="alamat" class=" mb-2 form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" required>

                <label for="no_hp" class=" mb-2 form-label">Nomer HP</label>
                <input type="number" name="no_hp" class=" mb-2 form-control" required> 
                                
                <input type="submit" value="Tambah" class="btn btn-dark text-white">
            </form>                
            </div>
        </div>
    </div>

</body>
</html>
