<?php
include 'conn.php';
include 'header.php';
$kd_sewa = $_GET['kd_sewa'];
$sql_sewa = "select * from sewa where kd_sewa = '$kd_sewa'";
$query_sewa = mysqli_query($conn,$sql_sewa);

$sql_mobil = "select * from mobil";
$query_mobil = mysqli_query($conn,$sql_mobil);

$sql_customer = "select * from customer";

$query_customer = mysqli_query($conn,$sql_customer);
while ($sewa = mysqli_fetch_assoc($query_sewa)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<div class="container mt-3">
        <div class="card shadow">
            <div class="card-header bg-success">Edit</div>
            <div class="card-body">
            <form action="p_edit.php" method="post">
         <label class="form-label m-1" for="kd_sewa">Kode Sewa</label>
        <input class="form-control" type="number" value=<?=$kd_sewa?> name ="kd_sewa" readonly>  
         <label class="form-label m-1" for="kd_mobil">Mobil</label>
            <select class="form-select" name="kd_mobil" id="">
                <option value="">Pilih Mobil</option>
                <?php
                while($mobil = mysqli_fetch_assoc($query_mobil)){
                ?>
                <option value=<?=$mobil['kd_mobil']?> 
                <?php 
                if($mobil['stok']<=0){echo "disabled ";}
                if($mobil['kd_mobil']==$sewa['kd_mobil']) {echo "selected";}?> ><?=ucwords($mobil['jenis_mobil'])?></option>
                <?php } ?>
            </select> 

             <label class="form-label m-1" for="kd_customer">Customer</label>
            <select name="kd_customer" class="form-select">
                <option value="">Pilih Customer</option>
                <?php
                while($customer = mysqli_fetch_assoc($query_customer)){
                ?>
                <option value=<?=$customer['kd_customer']?> 
                <?php 
                if($customer['kd_customer']==$sewa['kd_customer']) {echo "selected";}?>><?=ucwords($customer['nama'])?></option>
                <?php } ?>
            </select> 

             <label class="form-label m-1" for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" value=<?=$sewa['tgl_pinjam']?> class="form-control"> 
            
             <label class="form-label m-1" for="tgl_kembali">Tanggal Kembali</label>
            <input type="date" name="tgl_kembali" value=<?=$sewa['tgl_kembali']?> class="form-control"> 
            
            <input type="submit" value="Edit" class="btn btn-success mt-3">
        </form>
</body>
</html>
<?php } ?>