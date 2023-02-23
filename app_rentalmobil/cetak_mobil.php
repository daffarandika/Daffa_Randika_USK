<?php
include 'conn.php';
include 'header.php';
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
    <title>Print Mobil</title>
</head>
<body>
    <div class="container mt-3">

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
                <p id="hide">Pencet header tabel untuk mengubah urutan</p>

    <button onclick='history.back()' id='hide' class="btn btn-danger"> &lt Kembali</button>
    <button onclick='window.print()' id='hide' class="btn btn-warning">Print</button>

    </div>

</body>
</html>