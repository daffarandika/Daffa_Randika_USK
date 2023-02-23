<?php
include 'conn.php';
include 'header.php';
$kd_customer = $_GET['kd_customer'];
$sql = "select * from customer where kd_customer = '$kd_customer'";
$query = mysqli_query($conn,$sql);
while ($customer = mysqli_fetch_assoc($query)) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
</head>
<body>
<div class="container mt-3">
        <div class="card shadow">
            <div class="card-header bg-success">Edit</div>
            <div class="card-body">
            <form action="p_edit_customer.php" method="post">
        <label class="form-label m-1" for="kd_customer">Kode Customer</label>
        <input class="form-control" type="number" value=<?=$kd_customer?> name ="kd_customer" readonly>

        <label class="form-label m-1" for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?=$customer['nama']?>" >

        <label class="form-label m-1" for="kd_customer">Alamat</label>
        <input type="text" name="alamat" class="form-control" value="<?=$customer['alamat']?>">

             <label class="form-label m-1" for="no_hp">Nomer HP</label>
            <input type="number" name="no_hp" value=<?=$customer['no_hp']?> class="form-control"> 
                 
            <input type="submit" value="Edit" class="btn btn-success mt-3">
        </form>
</body>
</html>
<?php } ?>