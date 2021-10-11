<?php
include('../connection.php');
			
	if(! get_magic_quotes_gpc() )
	{
		$kodep = addslashes ($_POST['kodep']);
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
   		$keteranganmanajer = addslashes ($_POST['keteranganmanajer']);
   		$keterangan= addslashes ($_POST['keterangan']);
	}


	else
	{
   		$kodep = addslashes ($_POST['kodep']);
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
   		$keteranganmanajer = addslashes ($_POST['keteranganmanajer']);
   		$keterangan= addslashes ($_POST['keterangan']);
	
	}
		
$sql = "UPDATE tbpeminjaman SET kodep='$kodep', kode_aset='$kode_aset',statuspeminjaman='$statuspeminjaman',keteranganmanajer='$keteranganmanajer',keterangan='$keterangan' WHERE kodep='$kodep'" ;

   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/halmanajerumum.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>