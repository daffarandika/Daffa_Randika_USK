<?php
include 'conn.php';
$kd_sewa = $_POST['kd_sewa'];
$kd_mobil = $_POST['kd_mobil'];
$kd_customer = $_POST['kd_customer'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

if($tgl_pinjam > $tgl_kembali){
    echo "<script>alert('tanggal tidak valid');history.back()</script>";
} else{
    $diff = date_diff(date_create($tgl_pinjam), date_create($tgl_kembali));
    $hari = $diff -> format("%a") + 1;
    
    $sql = "select * from mobil where kd_mobil = '$kd_mobil'";
    $query = mysqli_query($conn,$sql);
    while($mobil = mysqli_fetch_assoc($query)){
        $tarif_sewa = $mobil['tarif_sewa'];
    }
    $total_sewa = $hari * $tarif_sewa;


    $sql2 = "update sewa set kd_mobil = '$kd_mobil', kd_customer = '$kd_customer', 
             tgl_pinjam = '$tgl_pinjam', tgl_kembali = '$tgl_kembali', total_sewa = '$total_sewa' 
             where kd_sewa = '$kd_sewa'";
    $query2 = mysqli_query($conn,$sql2);
    if($query2){
        header("location:index.php?sort=kd_sewa");
    } else {
        var_dump($GLOBALS);
    }
}





?>