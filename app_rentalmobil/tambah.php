<?php
include 'conn.php';
include 'header.php';
$sql_mobil = "select * from mobil";
$query_mobil = mysqli_query($conn,$sql_mobil);


$username = $_SESSION['username'];

$sql_customer;
if ($username == "admin"){
    $sql_customer = "select * from customer where nama != 'admin'";
}else {
    $sql_customer = "select * from customer where nama = '$username' ";
}

$query_customer = mysqli_query($conn,$sql_customer);

$sql_cek_akun = "select * from customer where nama = '$username'";
$query_cek_akun = mysqli_query($conn,$sql_cek_akun);
if($query_cek_akun -> num_rows == 0){
    echo "<script>alert('Mohon lengkapi data diri anda');document.location='tambah_customer.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<body>
    <div class="container mt-3">
        <div class="card shadow">
            <div class="card-header bg-success">Tambah</div>
            <div class="card-body">
            <form action="p_tambah.php" method="post">
                <label for="kd_mobil" class=" mb-2 form-label">Mobil</label>
                <select name="kd_mobil" class=" mb-2 form-select" required>
                    <option value="">Pilih Mobil</option>
                    <?php
                    while($mobil = mysqli_fetch_assoc($query_mobil)){
                    ?>
                    <option value=<?=$mobil['kd_mobil']?> 
                    <?php if($mobil['stok']<=0){echo "disabled";}?> >
                        <?=ucwords($mobil['jenis_mobil'])?>
                      </option>
                    <?php } ?>
                </select> 

                <label for="kd_customer" class=" mb-2 form-label">Customer</label>
                <select name="kd_customer" class=" mb-2 form-select" >
                    <option value="">Pilih Customer</option>
                    <?php
                    while($customer = mysqli_fetch_assoc($query_customer)){
                    ?>
                    <option value="<?=$customer['kd_customer']?>" 
                    <?php if ($username == $customer['nama']) {echo "selected";}?>>
                    <?=ucwords($customer['nama'])?>
                </option>
                    <?php } ?>
                </select> 

                <label for="tgl_pinjam" class=" mb-2 form-label">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" class=" mb-2 form-control" required> 
                
                <label for="tgl_kembali" class=" mb-2 form-label">Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" class=" mb-2  mb-2 form-control" required> 
                
                <input type="submit" value="Tambah" class="btn btn-dark text-white">
            </form>                
            </div>
        </div>
    </div>

</body>
</html>
