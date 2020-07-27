<?php
    session_start();

    //cek apakah user sudah login
    if(!isset($_SESSION['username'])){
        die("<script>alert('Anda Belum Login');document.location.href='../index.php'</script>");//
    }

    //cek level user
    if($_SESSION['level']!="Administrator")
    {
        die("<script>alert('Anda Bukan Admin');document.location.href='../index.php'</script>");
    }
?>