<?php
include('../connection.php');

 

			
	if(! get_magic_quotes_gpc() )
	{
	
   	
		$koder = addslashes ($_POST['koder']);
   		$status = addslashes ($_POST['status']);
		$keterangan = addslashes ($_POST['keterangan']);
	}


	else
	{
   	
   		$koder = addslashes ($_POST['koder']);
   		$status = addslashes ($_POST['status']);
		$keterangan = addslashes ($_POST['keterangan']);
	}
		


     $sql1 = "UPDATE tbpengadaan SET koder='$koder',status='$status',keterangan='$keterangan' WHERE koder='$koder' " ;
   

	$tambahdata = mysqli_query( $connection, $sql1);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/halperlengkapan.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>