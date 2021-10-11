<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$tgl_input = addslashes ($_POST['tgl_input']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
		$kelompok_aset = addslashes ($_POST['kelompok_aset']);
		$tgl_beli = addslashes ($_POST['tgl_beli']);
		$penyedia_jasa = addslashes ($_POST['penyedia_jasa']);
		$lokasi_pembelian = addslashes ($_POST['lokasi_pembelian']);
		$kondisi_aset = addslashes ($_POST['kondisi_aset']);
		
		$nama_aktiva= addslashes ($_POST['nama_aktiva']);
		$masa_perkiraan= addslashes ($_POST['masa_perkiraan']);
		

	}


	else
	{
   	
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$tgl_input = addslashes ($_POST['tgl_input']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
		$kelompok_aset = addslashes ($_POST['kelompok_aset']);
		$tgl_beli = addslashes ($_POST['tgl_beli']);
		$penyedia_jasa = addslashes ($_POST['penyedia_jasa']);
		$lokasi_pembelian = addslashes ($_POST['lokasi_pembelian']);
		$kondisi_aset = addslashes ($_POST['kondisi_aset']);
		
		$nama_aktiva= addslashes ($_POST['nama_aktiva']);
		$masa_perkiraan= addslashes ($_POST['masa_perkiraan']);
		

	
	}
		

	$sql = "UPDATE tbaset SET kode_aset='$kode_aset',tgl_input='$tgl_input',nama_aset='$nama_aset',kelompok_aset='$kelompok_aset',tgl_beli='$tgl_beli',penyedia_jasa='$penyedia_jasa',lokasi_pembelian='$lokasi_pembelian',kondisi_aset='$kondisi_aset',nama_aktiva='$nama_aktiva',masa_perkiraan='$masa_perkiraan' WHERE kode_aset='$kode_aset' " ;

	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/fixedasset.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>