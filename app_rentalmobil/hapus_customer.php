<?php
include "conn.php";
$kd_customer = $_GET['kd_customer'];
$sql = "delete from customer where kd_customer = '$kd_customer'";
$query = mysqli_query($conn,$sql);
if($query){
    header("location:data_customer.php?hapus=sukses");
} else {
    var_dump($GLOBALS);
}
?>