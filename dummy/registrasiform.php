<?php
require 'function.php';
if (isset($_POST["register"])) {

    if('registrasi'($_POST) > 0 ){
        echo "<script>
        alert('Registrasi Berhasil');
        document.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
        alert('Registrasi Gagal');
        document.location.href = 'registrasi.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="register.css">
    <title>Register Page</title>
</head>
<body>
    <div class="login-container">
        <img src="/assets/icon/jogfood-shadow.png" alt="Jogfood">
        <form class="form"> 
        <div class="flex-column align-items-center">
            <label>Username</label>
        <div class="inputForm">
            <i class="fa-solid fa-user"></i>
            <input placeholder="Enter your Username" class="input" type="text" name=username id=username>
        </div>
        <div class="flex-column">
            <label>Email </label></div>
        <div class="inputForm">
            <i class="fa-solid fa-user"></i>
            <input placeholder="Enter your Email" class="input" type="text" name=email id=email>
        </div>
        <div class="flex-column">
            <label>Password </label></div>
        <div class="inputForm">
            <i class="fa-solid fa-lock"></i>
            <input placeholder="Enter your Password" class="input" type="password" name=password id=password>
        </div>
        <div class="flex-column">
            <label>Confirm Password </label></div>
        <div class="inputForm">
            <i class="fa-solid fa-lock"></i>
            <input placeholder="Enter your Password" class="input" type="password" name=password2 id=password2>
        </div>
        <button class="button-submit" name="register">Sign Up</button>
        Sudah Punya Akun?<span class="span"><a href=loginform.php style="text-decoration: none;">Masuk Disini!</a></span>
    </div>
</form>
</body>
</html>