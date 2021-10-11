<?php
include('../connection.php');
			
	if(! get_magic_quotes_gpc() )
	{
		$koder = addslashes ($_POST['koder']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
   		$status = addslashes ($_POST['status']);
   		$keterangan = addslashes ($_POST['keterangan']);
	}


	else
	{
   		$koder = addslashes ($_POST['koder']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
   		$status = addslashes ($_POST['status']);
   		$keterangan = addslashes ($_POST['keterangan']);
	
	}
		
$sql = "UPDATE tbpengadaan SET koder='$koder', nama_aset='$nama_aset',status='$status',keterangan='$keterangan' WHERE koder='$koder'" ;

   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/halmanajerakun.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>