<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>
<?php
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            
            $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");

            if(mysqli_num_rows($query) > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['username'] = $data;
                echo '<script>alert("Login Berhasil '.data ['username'].'");location.href="dashboard.php";</script>';
            }else {
                echo '<script>alert("Login Gagal, Silahkan Cek Username atau Password anda Kembali");</script>';
            }
        }
    ?>
<div class="login-container" id="loginform">
        <img src="/assets/icon/selamat-datang.png" alt="Jogfood">
        <form method="post" action="register.php" class="form">
            <div class="flex-column align-items-center">
                <label>Username</label>
            </div>
            <div class="inputForm">
                <i class="fa-solid fa-user"></i>
                <input placeholder="Enter your Username" class="input" type="text" name="username" id="uname">
            </div>
            <div class="flex-column">
                <label>Password</label>
            </div>
            <div class="inputForm">
                <i class="fa-solid fa-lock"></i>
                <input placeholder="Enter your Password" class="input" type="password" name="password" id="password">
            </div>
            <div class="flex-row">
                <div>
                    <input type="radio" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <span class="span"><a href="forgot-password.html" style="text-decoration: none;">Forgot password?</a></span>
            </div>
            <button class="button-submit">Sign In</button>
            Tidak Punya Akun?<span class="span"><a href=registerform.php style="text-decoration: none;">Daftar Disini!</a></span>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"></script>
    </body>
    </html>