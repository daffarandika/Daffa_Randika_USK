<?php 
session_start();
include 'conn.php';
session_start();
if($_SESSION['username'] == ""){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @media print{
            #hide{
                visibility:hidden;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar bg-danger sticky-top" id="hide">
        <div class="container p-1">
            <a href="index.php" style="text-decoration:none;">
                <div class="navbar-brand text-white"><b>Rental Mobil</b></div>
            </a>
            <div class="d-flex">
            <a href="data_mobil.php" class="m-2 text-white" style="text-decoration:none;">Data Mobil</a>
            <a href="data_customer.php" class="m-2 text-white" style="text-decoration:none;">Data Customer</a>
            <p class="m-2 text-white"><?=$_SESSION['username']?></p>
            <a href="logout.php"><button class="btn btn-outline-light">logout</button></a>
            </div>

        </div>
    </nav>
</body>
</html>