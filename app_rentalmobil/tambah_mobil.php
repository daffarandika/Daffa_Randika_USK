<?php
include 'conn.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header bg-primary">Tambah</div>
            <div class="card-body">
            <form action="p_tambah_mobil.php" method="post">
                <label for="jenis_mobil">Jenis Mobil</label>
                <input type="text" name="jenis_mobil" class="form-control">

                <label for="warna" class=" mb-2 form-label">Warna</label>
                <input type="text" name="warna" class="form-control" required>

                <label for="stok" class=" mb-2 form-label">Stok</label>
                <input type="number" name="stok" class=" mb-2 form-control" required> 
                
                <label for="tarif_sewa" class=" mb-2 form-label">Tarif Sewa</label>
                <input type="number" name="tarif_sewa" class=" mb-2  mb-2 form-control" required> 
                
                <input type="submit" value="Tambah" class="btn btn-dark text-white">
            </form>                
            </div>
        </div>
    </div>

</body>
</html>
