<?php
session_start();
include 'conn.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "select * from users where username = '$username' and password = '$password'";
    $query = mysqli_query($conn,$sql);
    if($query -> num_rows > 0){
        $_SESSION['username'] = $username;
        header("location:index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <div class="container mt-3 ">
            <div class="rows ">
                <div class="card shadow ">
                    <div class="card-header text-white bg-primary">Login</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" required> <br>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required> <br>
                            <input type="submit" name="submit" class="btn btn-danger" value="Login"> <br>
                            <p class="mt-3">Belum punya akun ? <a href="register.php">Daftar Sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>