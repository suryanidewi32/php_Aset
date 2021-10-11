<?php
include('../connection.php');

			
	if(! get_magic_quotes_gpc() )
	{
	

   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$kegiatan = addslashes ($_POST['kegiatan']);
   		$lokasi_kegiatan = addslashes ($_POST['lokasi_kegiatan']);
		$jumlah_pesanan = addslashes ($_POST['jumlah_pesanan']);
		$tgl_peminjaman = addslashes ($_POST['tgl_peminjaman']);
		$tgl_pengembalian = addslashes ($_POST['tgl_pengembalian']);
		
	}


	else
	{
   	

   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$kegiatan = addslashes ($_POST['kegiatan']);
   		$lokasi_kegiatan = addslashes ($_POST['lokasi_kegiatan']);
		$jumlah_pesanan = addslashes ($_POST['jumlah_pesanan']);
		$tgl_peminjaman = addslashes ($_POST['tgl_peminjaman']);
		$tgl_pengembalian = addslashes ($_POST['tgl_pengembalian']);
		
	
	}
		
$sql = "UPDATE tbpeminjaman SET kode_aset='$kode_aset',kegiatan='$kegiatan',lokasi_kegiatan='$lokasi_kegiatan',jumlah_pesanan='$jumlah_pesanan',tgl_peminjaman='$tgl_peminjaman',tgl_pengembalian='$tgl_pengembalian' WHERE kode_aset='$kode_aset' " ;


	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/menunggu.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>