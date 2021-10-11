<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$status = addslashes ($_POST['status']);
   		$keterangan = addslashes ($_POST['keterangan']);
   		$keteranganapproval = addslashes ($_POST['keteranganapproval']);

		
	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$status = addslashes ($_POST['status']);
   		$keterangan = addslashes ($_POST['keterangan']);
   		$keteranganapproval = addslashes ($_POST['keteranganapproval']);

	
	}
		

	$sql = "INSERT INTO tbpeminjaman (kode_aset,keterangan,keteranganapproval) VALUES
     ('$kode_aset','$keterangan','$keteranganapproval')";

    $sql1 = "UPDATE tbaset SET status='$status' WHERE kode_aset='$kode_aset' " ;
   
	$tambahdata = mysqli_query( $connection, $sql);

	$tambahdata = mysqli_query( $connection, $sql1);
	

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