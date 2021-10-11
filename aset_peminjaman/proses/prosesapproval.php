<?php
include('../connection.php');

 
if(isset($_POST['simpan'])){

			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $_FILES['ttdpetugas']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['ttdpetugas']['size'];
			$file_tmp = $_FILES['ttdpetugas']['tmp_name'];	
 
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
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
		$namapetugas = addslashes ($_POST['namapetugas']);
		$keterangan = addslashes ($_POST['keterangan']);
	}


	else
	{
   	
   		$kodep = addslashes ($_POST['kodep']);
   		$statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
		$namapetugas = addslashes ($_POST['namapetugas']);
		$keterangan = addslashes ($_POST['keterangan']);
	}
		


     $sql1 = "UPDATE tbpeminjaman SET kodep='$kodep',statuspeminjaman='$statuspeminjaman',namapetugas='$namapetugas',ttdpetugas='$nama',keterangan='$keterangan' WHERE kodep='$kodep' " ;
   

	$tambahdata = mysqli_query( $connection, $sql1);
	

	if(! $tambahdata )
	{
  	die('Gagal Tambah Data: ' . mysqli_error($connection));
	}
	else
	{ ?>

		<script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/halperlengkapan.php";
        </script>
<?php }
	
	die();
	echo "Berhasil tambah data\n";
	mysqli_close($link);


?>