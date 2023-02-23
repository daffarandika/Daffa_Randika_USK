<?php
session_start();
include 'conn.php';
include 'header.php';
if($_SESSION['username'] == ""){
    header("location:login.php");
} else if ($_SESSION['username'] != "admin"){
    $order;
    if(isset($_GET['sort'])){
        $order = $_GET['sort'];
    } else {
        $order = "'date_added'";
    }
    $sql = "select * from mobil order by $order";
    $query = mysqli_query($conn,$sql);
    // var_dump($GLOBALS);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Mobil</title>
    </head>
    <body>
        <div class="container mt-3">
            <div class="card shadow">
                <div class="card-header bg-primary">
                    <p class="m-2"><b>Sewa</b></p>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <tr class="table-dark">
                            <td><a style="text-decoration:none;color:white;" href="?sort=kd_mobil">Kode Mobil</a></td>
                            <td><a style="text-decoration:none;color:white;" href="?sort=jenis_mobil">Jenis Mobil</a></td>
                            <td><a style="text-decoration:none;color:white;" href="?sort=warna">Warna</a></td>
                            <td><a style="text-decoration:none;color:white;" href="?sort=stok">Stok</a></td>
                            <td><a style="text-decoration:none;color:white;" href="?sort=tarif_sewa">Tarif Sewa</a></td>
                        </tr>
                        <?php
                        while($mobil = mysqli_fetch_assoc($query)){
                        ?>
                        <tr>
                            <td><?=$mobil['kd_mobil']?></td>
                            <td><?=ucwords($mobil['jenis_mobil'])?></td>
                            <td><?=ucwords($mobil['warna'])?></td>
                            <td><?=$mobil['stok']?></td>
                            <td>Rp. <?=number_format($mobil['tarif_sewa'])?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <p>Pencet header tabel untuk mengubah urutan</p>
        <a href="cetak_mobil.php"><button class="btn btn-warning">Preview Print</button></a>
                </div>
            </div>
        </div>
    
    </body>
    </html>

    <?php
} else {

$order;
if(isset($_GET['sort'])){
    $order = $_GET['sort'];
} else {
    $order = "'date_added'";
}
$sql = "select * from mobil order by $order";
$query = mysqli_query($conn,$sql);
// var_dump($GLOBALS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                <p class="m-2"><b>Data Mobil</b></p>
                <a href="tambah_mobil.php"><button class="btn btn-danger">Tambah</button></a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <tr class="table-dark">
                        <td><a style="text-decoration:none;color:white;" href="?sort=kd_mobil">Kode Mobil</a></td>
                        <td><a style="text-decoration:none;color:white;" href="?sort=jenis_mobil">Jenis Mobil</a></td>
                        <td><a style="text-decoration:none;color:white;" href="?sort=warna">Warna</a></td>
                        <td><a style="text-decoration:none;color:white;" href="?sort=stok">Stok</a></td>
                        <td><a style="text-decoration:none;color:white;" href="?sort=tarif_sewa">Tarif Sewa</a></td>
                        <td colspan='2'>Aksi</td>
                    </tr>
                    <?php
                    while($mobil = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?=$mobil['kd_mobil']?></td>
                        <td><?=ucwords($mobil['jenis_mobil'])?></td>
                        <td><?=ucwords($mobil['warna'])?></td>
                        <td><?=$mobil['stok']?></td>
                        <td>Rp. <?=number_format($mobil['tarif_sewa'])?></td>
                        <td><a href="hapus_mobil.php?kd_mobil=<?=$mobil['kd_mobil']?>"><button class="btn btn-warning">Hapus</button></a></td>
                        <td><a href="edit_mobil.php?kd_mobil=<?=$mobil['kd_mobil']?>"><button class="btn btn-success">Edit</button></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <p>Pencet header tabel untuk mengubah urutan</p>
    <a href="cetak_mobil.php"><button class="btn btn-warning">Preview Print</button></a>

            </div>
        </div>
    </div>

</body>
</html>

    <?php
}
?>