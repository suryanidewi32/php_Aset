<?php
include('../connection.php');

 

			
	if(! get_magic_quotes_gpc() )
	{
	
   	
		$kodep = addslashes ($_POST['kodep']);
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
		$keterangan = addslashes ($_POST['keterangan']);
	}


	else
	{
   	
   		$kodep = addslashes ($_POST['kodep']);
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
		$keterangan = addslashes ($_POST['keterangan']);
	}
		


     $sql1 = "UPDATE tbpeminjaman SET kodep='$kodep',statuspeminjaman='$statuspeminjaman',keterangan='$keterangan' WHERE kodep='$kodep' " ;
   

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