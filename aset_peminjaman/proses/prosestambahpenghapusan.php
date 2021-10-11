<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$metode_penghapusan = addslashes ($_POST['metode_penghapusan']);
   		$status = addslashes ($_POST['status']);
   		$nilai_residu = addslashes ($_POST['nilai_residu']);
		$nama_penerima = addslashes ($_POST['nama_penerima']);
		$tgl_penghapusan = addslashes ($_POST['tgl_penghapusan']);
	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$metode_penghapusan = addslashes ($_POST['metode_penghapusan']);
   		$status = addslashes ($_POST['status']);
   		$nilai_residu = addslashes ($_POST['nilai_residu']);
   		$nama_penerima = addslashes ($_POST['nama_penerima']);
   		$tgl_penghapusan = addslashes ($_POST['tgl_penghapusan']);
	
	}
		

	$sql = "INSERT INTO tbpenghapusan (kode_aset,metode_penghapusan,nilai_residu,nama_penerima,tgl_penghapusan) VALUES
     ('$kode_aset','$metode_penghapusan','$nilai_residu','$nama_penerima','$tgl_penghapusan')";

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
         window.location = "http://localhost/aset_peminjaman/penghapusan.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>