<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$NIK = addslashes ($_POST['NIK']);
   		$nama_user = addslashes ($_POST['nama_user']);
   		$jabatan = addslashes ($_POST['jabatan']);
   		$bagian = addslashes ($_POST['bagian']);
		$username = addslashes ($_POST['username']);
		$password = addslashes (md5($_POST['password']));
		$level = addslashes ($_POST['level']);

}
	else
	{
   		$NIK = addslashes ($_POST['NIK']);
   		$nama_user = addslashes ($_POST['nama_user']);
   		$jabatan = addslashes ($_POST['jabatan']);
   		$bagian = addslashes ($_POST['bagian']);
		$username = addslashes ($_POST['username']);
		$password = addslashes (md5($_POST['password']));
		$level = addslashes ($_POST['level']);
	
	}
		

	$sql = "INSERT INTO tbuser (NIK,nama_user,jabatan,bagian,username,password,level) VALUES
     ('$NIK','$nama_user','$jabatan','$bagian','$username','$password','$level')";
   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "hhttp://localhost/aset_peminjaman/index.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>