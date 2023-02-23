<?php
include 'conn.php';
include 'header.php';
$kd_sewa = $_GET['kd_sewa'];
$sql = "select * from sewa where kd_sewa = '$kd_sewa'";
$query = mysqli_query($conn,$sql);

while ($sewa = mysqli_fetch_assoc($query)){
    $kd_mobil = $sewa['kd_mobil'];
    $sql_mobil = "select * from mobil where kd_mobil = '$kd_mobil'";
    $query_mobil = mysqli_query($conn,$sql_mobil);

    while ($mobil = mysqli_fetch_assoc($query_mobil)){
        $jenis_mobil = $mobil['jenis_mobil'];
    }

    $kd_customer = $sewa['kd_customer'];
    $sql_customer = "select * from customer where kd_customer = '$kd_customer'";
    $query_customer = mysqli_query($conn,$sql_customer);

    while ($customer = mysqli_fetch_assoc($query_customer)){
        $nama = $customer['nama'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Kuitansi</title>
    <style>
        #kuitansi {
            border-style:solid;
        }
        td{
            padding:10px;
        }
    </style>
</head>
<body>
    <div class="rows">
        <div class="col-7">
        <div class="container m-5" id="kuitansi">
        <table>
            <tr>
                <td>Kode Sewa</td>
                <td> : </td>
                <td><?=$kd_sewa?></td>
            </tr>
            <tr>
                <td>Penyewa</td>
                <td> : </td>
                <td><?=strtoupper($nama)?></td>
            </tr>
            <tr>
                <td>Mobil</td>
                <td> : </td>
                <td><?=strtoupper($jenis_mobil)?></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td> : </td>
                <td><?=date_format(date_create($sewa['tgl_pinjam']), "d-M-Y")?></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td> : </td>
                <td><?=date_format(date_create($sewa['tgl_kembali']), "d-M-Y")?></td>
            </tr>
            <tr>
                <td>Total Sewa</td>
                <td> : </td>
                <td>Rp. <?=number_format($sewa['total_sewa'])?></td>
            </tr>
        </table>    
        <button onclick='window.print()' class="btn btn-warning m-3" id='hide'>Print</button>
    </div>

        </div>

    </div>
</body>
</html>
<?php } ?>