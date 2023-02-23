<?php
include 'conn.php';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

if($query0 -> num_rows > 0){
    echo "<script>alert('customer sudah ada');history.back()</script>";
} else {
    $sql = "insert into customer (nama, alamat, no_hp) values 
    ('$nama', '$alamat','$no_hp')";
    $query = mysqli_query($conn,$sql);
    if($query){
    header("location:index.php?tambah=sukses");
    } else {
    var_dump($GLOBALS);
    }
}

?>