<?php
session_start();
include 'conn.php';
include 'header.php';
$username = $_SESSION['username'];

$sql_cek_akun = "select * from customer where nama = '$username'";
$query_cek_akun = mysqli_query($conn,$sql_cek_akun);
if($query_cek_akun -> num_rows == 0){
    header("location:tambah.php");
}

$order;
if(isset($_GET['sort'])){
    $order = $_GET['sort'];
} else {
    $order = "'date_added'";
}
$sql;
$query;
if($username == ""){
    header("location:login.php");
} else if ($username == "admin") {
    $sql = "select *, mobil.jenis_mobil, customer.nama from sewa
        join mobil on sewa.kd_mobil = mobil.kd_mobil
        join customer on sewa.kd_customer = customer.kd_customer order by $order";
    $query = mysqli_query($conn,$sql);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
    button{
        display:hidden;    
    }</style>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                <p class="m-2"><b>Data Sewa</b></p>
                <a href="tambah.php"><button class="btn btn-danger">Tambah</button></a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center" > 
                    <tr class="table-dark">
                        <td><a style="text-decoration:none;color:white;" href="?sort=kd_sewa">Kode Sewa</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=jenis_mobil">Mobil</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=nama">Customer</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=tgl_pinjam">Tanggal Pinjam</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=tgl_kembali">Tanggal Kembali</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=total_sewa">Total Sewa</a></td>
                        <td colspan='3'>Aksi</td>
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
                        <td><a href="hapus.php?kd_sewa=<?=$sewa['kd_sewa']?>"><button class="btn btn-warning">Hapus</button></a></td>
                        <td><a href="edit.php?kd_sewa=<?=$sewa['kd_sewa']?>"><button class="btn btn-success">Edit</button></a></td>
                        <td><a href="cetak_kuitansi.php?kd_sewa=<?=$sewa['kd_sewa']?>"><button class="btn btn-primary">Print</button></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <p>Pencet header tabel untuk mengubah urutan</p>

    <a href="cetak.php"><button class="btn btn-primary">Preview Print</button></a>
            </div>
        </div>
    </div>

</body>
</html>
<?php
} else {
    $sql = "select *, mobil.jenis_mobil, customer.nama from sewa
        join mobil on sewa.kd_mobil = mobil.kd_mobil
        join customer on sewa.kd_customer = customer.kd_customer where nama = '$username' order by $order";
    $query = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
    button{
        display:hidden;    
    }</style>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header navbar bg-primary">
                <p class="m-2"><b>Data Sewa</b></p>
                <a href="tambah.php"><button class="btn btn-danger">Tambah</button></a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover text-center" > 
                    <tr class="table-dark">
                        <td><a style="text-decoration:none;color:white;" href="?sort=kd_sewa">Kode Sewa</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=jenis_mobil">Mobil</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=nama">Customer</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=tgl_pinjam">Tanggal Pinjam</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=tgl_kembali">Tanggal Kembali</a></td>
                        <td><a style="text-decoration:none;color:white;"" href="?sort=total_sewa">Total Sewa</a></td>
                        <td>Aksi</td>
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
                        <td><a href="cetak_kuitansi.php?kd_sewa=<?=$sewa['kd_sewa']?>"><button class="btn btn-primary">Print</button></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
                <p>Pencet header tabel untuk mengubah urutan</p>

            </div>
        </div>
    </div>

</body>
</html>
<?php } ?>
