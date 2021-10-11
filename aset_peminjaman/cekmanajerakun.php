<?php
 session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    die("Anda belum login");
}

//cek level user
if($_SESSION['level']!="Manajer_Keuangan"){
    die("Anda bukan Manajer Akuntansi");
}
?>