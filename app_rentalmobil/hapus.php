<?php
include 'conn.php';
session_start();
if($_SESSION['username'] == ""){
    header("location:login.php");
}
$kd_sewa = $_GET['kd_sewa'];
$sql = "delete from sewa where kd_sewa = '$kd_sewa'";
$query = mysqli_query($conn,$sql);
if($query){
    header("location:index.php?sort=kd_sewa");
} else {
    var_dump($GLOBALS);
}
?>