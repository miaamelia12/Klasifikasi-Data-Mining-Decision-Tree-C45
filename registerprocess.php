<?php
    include('connection.php');
    $error='';

    if(isset($_POST['submit'])) {
        
        $nama_lengkap = ucfirst($_POST['nama_lengkap']);
		$username = $_POST['username'];
		$level = $_POST['level'];
		$password = $_POST['password'];
            
        $sql = mysqli_query($connection, "INSERT INTO user VALUES ('$nama_lengkap', '$username', '$level', '$password')") or die (mysqli_error($connection));

        if($sql) {
            header("location: login.php");
        } else {
            $error = "Registrasi Gagal, Kolom Tidak Boleh Kosong!";
        }
    }
?>
