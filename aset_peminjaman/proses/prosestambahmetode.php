<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$nama_aktiva = addslashes ($_POST['nama_aktiva']);
   		$metode_penyusutan = addslashes ($_POST['metode_penyusutan']);
   		$umur_perkiraan = addslashes ($_POST['umur_perkiraan']);
		$nilai_penyusutan = addslashes ($_POST['nilai_penyusutan']);
		
	}


	else
	{
   	
		$nama_aktiva = addslashes ($_POST['nama_aktiva']);
   		$metode_penyusutan = addslashes ($_POST['metode_penyusutan']);
   		$umur_perkiraan = addslashes ($_POST['umur_perkiraan']);
		$nilai_penyusutan = addslashes ($_POST['nilai_penyusutan']);
	
	}
		

	$sql = "INSERT INTO depresiasi (nama_aktiva,metode_penyusutan,umur_perkiraan,nilai_penyusutan) VALUES
     ('$nama_aktiva','$metode_penyusutan','$umur_perkiraan','$nilai_penyusutan')";
   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/metode.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>