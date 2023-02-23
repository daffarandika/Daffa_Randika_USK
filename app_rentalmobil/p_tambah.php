<?php
include 'conn.php';
session_start();
$kd_mobil = $_POST['kd_mobil'];
$kd_customer = $_POST['kd_customer'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];


if($tgl_pinjam > $tgl_kembali){
    echo "<script>alert('tanggal tidak valid');history.back()</script>";
} else{
    if(($_SESSION['username'] != "admin") and $tgl_pinjam < date("Y-m-d")){
        echo "<script>alert('Tanggal tidak tidak boleh lebih kecil dari hari ini');history.back()</script>";
    }else {
        $diff = date_diff(date_create($tgl_pinjam), date_create($tgl_kembali));
        $hari = $diff -> format("%a") + 1;
        
        $sql = "select * from mobil where kd_mobil = '$kd_mobil'";
        $query = mysqli_query($conn,$sql);
        while($mobil = mysqli_fetch_assoc($query)){
            $tarif_sewa = $mobil['tarif_sewa'];
        }
        $total_sewa = $hari * $tarif_sewa;
    
    
        $sql2 = "insert into sewa (kd_mobil,kd_customer,tgl_pinjam,tgl_kembali,total_sewa)
                 values ('$kd_mobil','$kd_customer','$tgl_pinjam', '$tgl_kembali', '$total_sewa')";
        $query2 = mysqli_query($conn,$sql2);
        if($query2){
            header("location:index.php?sort=kd_sewa");
        } else {
            var_dump($GLOBALS);
        }
    }   
}
?>