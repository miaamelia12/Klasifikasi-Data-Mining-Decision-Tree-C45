<?php

    $error=''; 

    include "connection.php";
    if(isset($_POST['submit'])) {               
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        
                        
        $query = mysqli_query($connection, "SELECT * FROM user WHERE username='$username' AND password='$password'");
        if(mysqli_num_rows($query) == 0)
        {
            $error = "Username atau Password Salah!";
        }
        else
        {
            $row = mysqli_fetch_assoc($query);
            $_SESSION['username']=$row['username'];
            $_SESSION['level'] = $row['level'];
            
            if($row['level'] == "Administrator")
            {
                
                header("Location: admin");
            }
            else
            {
                $error = "Login Gagal, Coba Lagi!";
            }
        }
    }           
?>