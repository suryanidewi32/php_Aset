<?php
include('../connection.php');

if(isset($_POST['simpan'])){

			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_FILES['keterangan']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['keterangan']['size'];
			$file_tmp = $_FILES['keterangan']['tmp_name'];	
 
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
		$koder = addslashes ($_POST['koder']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
   		$tujuan = addslashes ($_POST['tujuan']);
   		$status = addslashes ($_POST['status']);
   		
   		
	}


	else
	{
   		$koder = addslashes ($_POST['koder']);
   		$nama_aset = addslashes ($_POST['nama_aset']);
   		$tujuan = addslashes ($_POST['tujuan']);
   		$status = addslashes ($_POST['status']);
   		
   		
	
	}
		
$sql = "UPDATE tbpengadaan SET koder='$koder', nama_aset='$nama_aset',tujuan='$tujuan',status='$status',keterangan='$nama' WHERE koder='$koder'" ;

   
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