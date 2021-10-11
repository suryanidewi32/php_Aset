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
		$harga_beli= addslashes ($_POST['harga_beli']);
		$nama_aktiva= addslashes ($_POST['nama_aktiva']);
		$masa_perkiraan= addslashes ($_POST['masa_perkiraan']);
		$stock= addslashes ($_POST['stock']);
		$stock1= addslashes ($_POST['stock1']);
		$NIK= addslashes ($_POST['NIK']);
		$statusbarang = addslashes ($_POST['statusbarang']);
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
		$harga_beli= addslashes ($_POST['harga_beli']);
		$nama_aktiva= addslashes ($_POST['nama_aktiva']);
		$masa_perkiraan= addslashes ($_POST['masa_perkiraan']);
		$stock= addslashes ($_POST['stock']);
		$stock1= addslashes ($_POST['stock1']);
		$NIK= addslashes ($_POST['NIK']);
		$statusbarang = addslashes ($_POST['statusbarang']);
	
	}
		

	$sql = "INSERT INTO tbaset (kode_aset,tgl_input,nama_aset,kelompok_aset,tgl_beli,penyedia_jasa,lokasi_pembelian,kondisi_aset,harga_beli,nama_aktiva,masa_perkiraan,stock,stock1,NIK) VALUES
     ('$kode_aset','$tgl_input','$nama_aset','$kelompok_aset','$tgl_beli','$penyedia_jasa','$lokasi_pembelian','$kondisi_aset','$harga_beli','$nama_aktiva','$masa_perkiraan','$stock','$stock1','$NIK')";

       $sql1 = "UPDATE tbpengadaan SET statusbarang='$statusbarang', kode_aset='$kode_aset' WHERE nama_aset='$nama_aset' " ;
   
   
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
         window.location = "http://localhost/aset_peminjaman/fixedasset.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>