<?php
session_start();
if($_SESSION['username'] == ""){
    header("location:login.php");
} else if ($_SESSION['username'] != "admin"){
    echo "<script>alert('anda perlu akses admin untuk mengakses data customer');history.back()</script>";
}
include 'conn.php';
include 'header.php';
$order;
if(isset($_GET['sort'])){
    $order = $_GET['sort'];
} else {
    $order = "'date_added'";
}
$sql = "select * from customer where nama != 'admin' order by $order";
$query = mysqli_query($conn,$sql);
// var_dump($GLOBALS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                <p class="m-2"><b>Data Customer</b></p>
                <a href="tambah_customer.php"><button class="btn btn-danger">Tambah</button></a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center">
                    <tr class="table-dark">
                        <td><a style="text-decoration:none;color:white;" href="?sort=kd_customer">Kode Customer</a></td>
                        <td><a style="text-decoration:none;color:white;" href="?sort=nama">Nama</a></td>
                        <td><a style="text-decoration:none;color:white;" href="?sort=alamat">Alamat</a></td>
                        <td><a style="text-decoration:none;color:white;" href="?sort=no_hp">No HP</a></td>
                        <td colspan='2'>Aksi</td>
                    </tr>
                    <?php
                    while($customer = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?=$customer['kd_customer']?></td>
                        <td><?=ucwords($customer['nama'])?></td>
                        <td><?=ucwords($customer['alamat'])?></td>
                        <td><?=$customer['no_hp']?></td>
                        <td><a href="hapus_customer.php?kd_customer=<?=$customer['kd_customer']?>"><button class="btn btn-warning">Hapus</button></a></td>
                        <td><a href="edit_customer.php?kd_customer=<?=$customer['kd_customer']?>"><button class="btn btn-success">Edit</button></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <p>Pencet header tabel untuk mengubah urutan</p>
    <a href="cetak_customer.php"><button class="btn btn-primary">Preview print</button></a>

            </div>
        </div>
    </div>

</body>
</html>