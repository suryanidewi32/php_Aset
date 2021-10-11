<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$luas_gedung = addslashes ($_POST['luas_gedung']);
   		$posisi = addslashes ($_POST['posisi']);
		$status = addslashes ($_POST['status']);
		$NIK = addslashes ($_POST['NIK']);
		
	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$luas_gedung = addslashes ($_POST['luas_gedung']);
   		$posisi = addslashes ($_POST['posisi']);
		$status = addslashes ($_POST['status']);
		$NIK = addslashes ($_POST['NIK']);
	}
		

	$sql = "INSERT INTO tbgedung (kode_aset,luas_gedung,posisi,NIK) VALUES
     ('$kode_aset','$luas_gedung','$posisi','$NIK')";

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
         window.location = "http://localhost/aset_peminjaman/gedung.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>