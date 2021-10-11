<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$jns = addslashes ($_POST['jns']);
   		$merk = addslashes ($_POST['merk']);
   		$posisi = addslashes ($_POST['posisi']);

		
	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$jns = addslashes ($_POST['jns']);
   		$merk = addslashes ($_POST['merk']);
   		$posisi = addslashes ($_POST['posisi']);

	
	}
		
$sql = "UPDATE daftarinventaris SET kode_aset='$kode_aset',jns='$jns',merk='$merk',posisi='$posisi' WHERE kode_aset='$kode_aset' " ;

	
   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/barang.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>