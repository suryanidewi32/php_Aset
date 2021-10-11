<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
		$NIK = addslashes ($_POST['NIK']);
   		$kode_aset = addslashes ($_POST['kode_aset']);
		$jumlah_pesanan = addslashes ($_POST['jumlah_pesanan']);
		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
		$kodep = addslashes ($_POST['kodep']);
		$keterangan = addslashes ($_POST['keterangan']);
	}


	else
	{
   	
		$NIK = addslashes ($_POST['NIK']);
   		$kode_aset = addslashes ($_POST['kode_aset']);
		$jumlah_pesanan = addslashes ($_POST['jumlah_pesanan']);
		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
		$kodep = addslashes ($_POST['kodep']);
		$keterangan = addslashes ($_POST['keterangan']);
	
	}
		
$sql = "UPDATE tbpeminjaman SET NIK='$NIK',kodep='$kodep',kode_aset='$kode_aset',jumlah_pesanan='$jumlah_pesanan',statuspeminjaman='$statuspeminjaman',keterangan='$keterangan' WHERE kodep='$kodep'" ;

 $sql1 = "UPDATE tbaset inner join tbpeminjaman on (tbpeminjaman.kode_aset=tbaset.kode_aset) SET tbaset.stock = (tbaset.stock + tbpeminjaman.jumlah_pesanan) WHERE 
 tbaset.kode_aset = '".$kode_aset."' " ;


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
         window.location = "http://localhost/aset_peminjaman/daftarinventaris.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>