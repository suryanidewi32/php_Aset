<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$luas_gedung = addslashes ($_POST['luas_gedung']);
   		$posisi = addslashes ($_POST['posisi']);
	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$luas_gedung = addslashes ($_POST['luas_gedung']);
   		$posisi = addslashes ($_POST['posisi']);
	
	}
		
$sql = "UPDATE tbgedung SET kode_aset='$kode_aset',luas_gedung='$luas_gedung',posisi='$posisi' " ;

   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/gedung.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>