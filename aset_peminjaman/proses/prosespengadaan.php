<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$koder = addslashes ($_POST['koder']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
		$kelompok_aset = addslashes ($_POST['kelompok_aset']);
		$merk = addslashes ($_POST['merk']);
		$posisi = addslashes ($_POST['posisi']);
		$tujuan = addslashes ($_POST['tujuan']);
		$stock1 = addslashes ($_POST['stock1']);
		$harga = addslashes ($_POST['harga']);
		$tgl_pengajuan = addslashes ($_POST['tgl_pengajuan']);
		$NIK= addslashes ($_POST['NIK']);
	}


	else
	{
   	
   		$koder = addslashes ($_POST['koder']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
		$kelompok_aset = addslashes ($_POST['kelompok_aset']);
		$merk = addslashes ($_POST['merk']);
		$posisi = addslashes ($_POST['posisi']);
		$tujuan = addslashes ($_POST['tujuan']);
		$stock1 = addslashes ($_POST['stock1']);
		$harga = addslashes ($_POST['harga']);
		$tgl_pengajuan = addslashes ($_POST['tgl_pengajuan']);
		$NIK= addslashes ($_POST['NIK']);
	}
		

	$sql = "INSERT INTO tbpengadaan (koder,nama_aset,kelompok_aset,merk, posisi,tujuan,stock1,harga,tgl_pengajuan,NIK) VALUES
     ('$koder','$nama_aset','$kelompok_aset','$merk','$posisi','$tujuan','$stock1','$harga','$tgl_pengajuan','$NIK')";
   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/wait.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>