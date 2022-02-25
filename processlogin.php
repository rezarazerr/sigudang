<?php

require 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// CEK USER DAN PASSWORD DI DALAM DATABASE
// TODO: CARI TERKAIT SQL INJECTION AND HOW TO PREVENT IT
$sql = "SELECT * FROM users WHERE username='$username' AND password='".md5($password)."'";



$result = mysqli_query($koneksi, $sql);



if(mysqli_num_rows($result) == 1) 
{
    // ADA USERNYA   
    // BERIKAN SESI/SESSION
    $row = mysqli_fetch_assoc($result);
	session_start();
    $_SESSION['username'] = $username;
    $_SESSION['is_login'] = true;
    $_SESSION['nama_user'] = $row['nama_user'];
    $_SESSION['id_level'] = $row['id_level'];
    
    echo "<script>
        window.location.replace('index.php');
    </script>";
}
else
{
    // GAGAL LOGIN   
    // Redirect ke halaman login
    echo "<script>
	
        window.location.replace('login.php?status=gagal');
    </script>";
}

?>