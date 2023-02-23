<?php
include 'conn.php';
include 'header.php';
$kd_mobil = $_GET['kd_mobil'];
$sql = "select * from mobil where kd_mobil = '$kd_mobil'";
$query = mysqli_query($conn,$sql);
while ($mobil = mysqli_fetch_assoc($query)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
</head>
<body>
<div class="container mt-3">
        <div class="card shadow">
            <div class="card-header bg-success">Edit</div>
            <div class="card-body">
            <form action="p_edit_mobil.php" method="post">
        <label class="form-label m-1" for="kd_mobil">Kode Mobil</label>
        <input class="form-control" type="number" value=<?=$kd_mobil?> name ="kd_mobil" readonly>

        <label class="form-label m-1" for="jenis_mobil">Jenis Mobil</label>
        <input type="text" name="jenis_mobil" class="form-select" value=<?=$mobil['jenis_mobil']?>>

        <label class="form-label m-1" for="kd_customer">Warna</label>
        <input type="text" name="warna" class="form-control" value=<?=$mobil['warna']?>>

             <label class="form-label m-1" for="stok">Stok</label>
            <input type="number" name="stok" value=<?=$mobil['stok']?> class="form-control"> 
            
             <label class="form-label m-1" for="tarif_sewa">Tarif Sewa</label>
            <input type="number" name="tarif_sewa" value=<?=$mobil['tarif_sewa']?> class="form-control"> 
            
            <input type="submit" value="Edit" class="btn btn-success mt-3">
        </form>
</body>
</html>
<?php } ?>