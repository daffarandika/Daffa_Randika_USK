<?php
include "conn.php";
$kd_mobil = $_GET['kd_mobil'];
$sql = "delete from mobil where kd_mobil = '$kd_mobil'";
$query = mysqli_query($conn,$sql);
if($query){
    header("location:data_mobil.php?hapus=sukses");
} else {
    var_dump($GLOBALS);
}
?>