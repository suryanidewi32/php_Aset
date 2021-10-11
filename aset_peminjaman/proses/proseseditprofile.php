<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
   		$NIK = addslashes ($_POST['NIK']);
   		$nama_user = addslashes ($_POST['nama_user']);
   		$jabatan = addslashes ($_POST['jabatan']);
   		$bagian = addslashes ($_POST['bagian']);
		$username = addslashes ($_POST['username']);
		

}


	else
	{
   	
   		$NIK = addslashes ($_POST['NIK']);
   		$nama_user = addslashes ($_POST['nama_user']);
   		$jabatan = addslashes ($_POST['jabatan']);
   		$bagian = addslashes ($_POST['bagian']);
		$username = addslashes ($_POST['username']);
		
	
	}
		

	$sql = "UPDATE tbuser SET NIK='$NIK',nama_user='$nama_user',jabatan='$jabatan',bagian='$bagian',username='$username' WHERE NIK='$NIK'" ;
   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/profile.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>