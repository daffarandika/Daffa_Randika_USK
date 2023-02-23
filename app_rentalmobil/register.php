<?php
session_start();
include 'conn.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "select * from users where username = '$username'";
    $query = mysqli_query($conn,$sql);
    if($query -> num_rows > 0){
       echo "<script>alert('username sudah diambil mohon pilih username yang lain')</script>";
    } else {
        $sql2 = "insert into users (username, password) values ('$username','$password')";
        $query2 = mysqli_query($conn,$sql2);
        if($query2){
            echo "<script>alert('Berhasil daftar silahkan login'); document.location='login.php';</script>";
        } else {
            echo "<script>alert('Kesalahan Sistem')";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<div class="justify-align-center">
        <div class="container mt-3 ">
            <div class="rows ">

                    <div class="card shadow ">
                        <div class="card-header text-white bg-primary">Register</div>
                        <div class="card-body">
                            <form action="" method="post">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username"> <br>
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"> <br>
                                <input type="submit" name="submit" class="btn btn-danger" value="Daftar"> <br>
                            </form>
                            <p class="mt-3">Sudah punya akun ? <a href="login.php">Masuk Sekarang</a></p>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</body>
</html>