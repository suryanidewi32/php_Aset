<?php
include('../connection.php');

if(isset($_POST['simpan'])){

			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_FILES['keteranganmanajer']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['keteranganmanajer']['size'];
			$file_tmp = $_FILES['keteranganmanajer']['tmp_name'];	
 
 if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 5000000){			
					move_uploaded_file($file_tmp, '../img/'.$nama);

				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}

			
	if(! get_magic_quotes_gpc() )
	{
		$kodep = addslashes ($_POST['kodep']);
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
   		
	}


	else
	{
   		$kodep = addslashes ($_POST['kodep']);
   		$kode_aset = addslashes ($_POST['kode_aset']);
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
   		
	
	}
		
$sql = "UPDATE tbpeminjaman SET kodep='$kodep', kode_aset='$kode_aset',statuspeminjaman='$statuspeminjaman',keteranganmanajer='$nama' WHERE kodep='$kodep'" ;

   
	$tambahdata = mysqli_query( $connection, $sql);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/halmanajerumum.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>