<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$jns = addslashes ($_POST['jns']);
   		$merk = addslashes ($_POST['merk']);
   		$posisi = addslashes ($_POST['posisi']);
		$NIK = addslashes ($_POST['NIK']);
		$status = addslashes ($_POST['status']);
		
	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$jns = addslashes ($_POST['jns']);
   		$merk = addslashes ($_POST['merk']);
   		$posisi = addslashes ($_POST['posisi']);
		$NIK = addslashes ($_POST['NIK']);
		$status = addslashes ($_POST['status']);
	}
		

	$sql = "INSERT INTO daftarinventaris (kode_aset,jns,merk,posisi,NIK) VALUES
     ('$kode_aset','$jns','$merk','$posisi','$NIK')";

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
         window.location = "http://localhost/aset_peminjaman/barang.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>