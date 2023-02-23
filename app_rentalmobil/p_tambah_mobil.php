<?php
include 'conn.php';
$jenis_mobil = $_POST['jenis_mobil'];
$warna = $_POST['warna'];
$stok = $_POST['stok'];
$tarif_sewa =$_POST['tarif_sewa'];

$sql0 = "select * from mobil where jenis_mobil = '$jenis_mobil'";
$query0 = mysqli_query($conn,$sql0);

if($query0 -> num_rows > 0){
    echo "<script>alert('mobil sudah ada');history.back()</script>";
} else {

    $sql = "insert into mobil (jenis_mobil, warna, stok, tarif_sewa) values 
    ('$jenis_mobil', '$warna','$stok','$tarif_sewa')";
    $query = mysqli_query($conn,$sql);
    if($query){
    header("location:data_mobil.php?tambah=sukses");
    } else {
    var_dump($GLOBALS);
}
}

?>