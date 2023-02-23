<?php
session_start();
if($_SESSION['username'] == ""){
    header("location:login.php");
}
include 'conn.php';
include 'header.php';
$order;
if(isset($_GET['sort'])){
    $order = $_GET['sort'];
} else {
    $order = "'date_added'";
}
$sql = "select *, mobil.jenis_mobil, customer.nama from sewa
        join mobil on sewa.kd_mobil = mobil.kd_mobil
        join customer on sewa.kd_customer = customer.kd_customer order by $order";
$query = mysqli_query($conn,$sql);
// var_dump($GLOBALS);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-3">

                <table class="table table-striped table-hover text-center">
                    <tr class="table-dark">
                        <td><a style="text-decoration:none;color:white;" href="?sort=kd_sewa">Kode Sewa</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=jenis_mobil">Mobil</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=nama">Customer</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=tgl_pinjam">Tanggal Pinjam</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=tgl_kembali">Tanggal Kembali</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=total_sewa">Total Sewa</a></td>
                    </tr>
                    <?php
                    while($sewa = mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                        <td><?=$sewa['kd_sewa']?></td>
                        <td><?=ucwords($sewa['jenis_mobil'])?></td>
                        <td><?=ucwords($sewa['nama'])?></td>
                        <td><?=date_format(date_create($sewa['tgl_pinjam']), "d-M-Y")?></td>
                        <td><?=date_format(date_create($sewa['tgl_kembali']), "d-M-Y")?></td>
                        <td>Rp. <?=number_format($sewa['total_sewa'])?></td>
                    </tr>
                    <?php
                    }
                    ?>

                </table>
                <button onclick='history.back()' id='hide' class="btn btn-danger"> &lt Kembali</button>
                <button id="hide" onclick='window.print()' class="btn btn-warning">Print</button>

    </body>
</html>