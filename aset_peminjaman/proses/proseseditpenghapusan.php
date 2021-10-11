<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$metode_penghapusan = addslashes ($_POST['metode_penghapusan']);
   		$nilai_residu = addslashes ($_POST['nilai_residu']);
   		$nama_penerima = addslashes ($_POST['nama_penerima']);
		
		
	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$metode_penghapusan = addslashes ($_POST['metode_penghapusan']);
   		$nilai_residu = addslashes ($_POST['nilai_residu']);
		$nama_penerima = addslashes ($_POST['nama_penerima']);
	}
		

$sql = "UPDATE tbpenghapusan SET kode_aset='$kode_aset',metode_penghapusan='$metode_penghapusan',nilai_residu='$nilai_residu',nama_penerima='$nama_penerima' " ;
	$tambahdata = mysqli_query( $connection, $sql);

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/penghapusan.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>