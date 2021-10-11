<?php
//insert.php

$connect = new PDO('mysql:host=localhost;dbname=dbasetpeminjaman', 'root', '');

if(isset($_POST["kegiatan"]))
{
 $query = "
 INSERT INTO tbpeminjaman 
 (kegiatan, tgl_peminjaman, tgl_pengembalian) 
 VALUES (:kegiatan, :tgl_peminjaman, :tgl_pengembalian)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':kegiatan'  => $_POST['kegiatan'],
   ':tgl_peminjaman' => $_POST['tgl_peminjaman'],
   ':tgl_pengembalian' => $_POST['tgl_pengembalian']
  )
 );
}


?>
