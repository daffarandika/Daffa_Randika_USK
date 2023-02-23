<?php
include 'conn.php';
$kd_customer = $_POST['kd_customer'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$sql0 = "select * from customer where nama = '$nama'";
$query0 = mysqli_query($conn,$sql0);

if($query0 -> num_rows > 0){
    echo "<script>alert('customer sudah ada');history.back()</script>";
} else {

    $sql = "update customer set nama = '$nama', 
            alamat = '$alamat', no_hp = '$no_hp' where kd_customer = '$kd_customer'";
    $query = mysqli_query($conn,$sql);
    if($query){
    header("location:data_customer.php?edit=sukses");
    } else {
    var_dump($GLOBALS);
}
}

?>