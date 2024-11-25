<?php
$conn=mysqli_connect("localhost","root","","pbl24");

function query($query){
    global $conn;
    $result=mysqli_query($conn,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nim=$data["nim"];
    $nama=$data["nama"];
    $email=$data["email"];
    $jurusan=$data["jurusan"];
    $query="INSERT INTO mahasiswa VALUES('$nim','$nama','$email','$jurusan')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;
    $username=strtolower(stripslashes($data["username"]));
    $password=mysqli_real_escape_string($conn, $data["password"]);
    $password2=mysqli_real_escape_string($conn, $data["password2"]);
    $email=$data["email"];

    //cek konfirmasi password
    if($password!=$password2){
        echo "<script>
        alert('Konfirmasi password salah');
        </script>";
        return false;
    }

    //cek username sudah ada atau belum
    $result=mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('Username sudah ada');
        </script>";
        return false;
    }

    //enkripsi password
    $password=password_hash($password,PASSWORD_DEFAULT);
    $query="INSERT INTO users VALUES('','$username','$password','$email')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>