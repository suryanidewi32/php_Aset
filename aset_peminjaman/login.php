<?php

$error=''; 
 // session_start();
include "connection.php";
if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    
                    
    $query = mysqli_query($connection, "SELECT * FROM tbuser WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['nik'] = $row["NIK"];
        
        

        if($row['level'] == "Petugas_Keuangan")
        {
            
            header("Location: halakun.php");
        }
        else if($row['level'] =="Petugas_Barang")
        {
            header("Location: halperlengkapan.php");
        }
        else if($row['level'] == "Manajer_BagUmum")
        {
            
            header("Location: halmanajerumum.php");
        }
        else if($row['level'] == "Karyawan")
        {
            
            header("Location: halpeminjam.php");
        }
         else if($row['level'] == "Manajer_Keuangan")
        {
            
            header("Location: halmanajerakun.php");
        }
        else
        {
            $error = "Failed Login";
        }
    }
}           
?>