<?php
include('../connection.php');

      
  if(! get_magic_quotes_gpc() )
  {
    $kodep = addslashes ($_POST['kodep']);
      $NIK = addslashes ($_POST['NIK']);
      $kode_aset = addslashes ($_POST['kode_aset']);
      $kegiatan = addslashes ($_POST['kegiatan']);
    $jumlah_pesanan = addslashes ($_POST['jumlah_pesanan']);
    $tgl_peminjaman = addslashes ($_POST['tgl_peminjaman']);
    $tgl_pengembalian = addslashes ($_POST['tgl_pengembalian']);
    $lokasi_kegiatan = addslashes ($_POST['lokasi_kegiatan']);

    $statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
  
  }


  else
  {
    $kodep = addslashes ($_POST['kodep']);
      $NIK = addslashes ($_POST['NIK']);
      $kode_aset = addslashes ($_POST['kode_aset']);
      $kegiatan = addslashes ($_POST['kegiatan']);
    $jumlah_pesanan = addslashes ($_POST['jumlah_pesanan']);
    $tgl_peminjaman = addslashes ($_POST['tgl_peminjaman']);
    $tgl_pengembalian = addslashes ($_POST['tgl_pengembalian']);

    $lokasi_kegiatan = addslashes ($_POST['lokasi_kegiatan']);
    $statuspeminjaman = addslashes ($_POST['statuspeminjaman']);
    

  
  }
    

 

    $link=mysqli_connect("localhost","root","","dbasetpeminjaman");
    $cek_stok=mysqli_query($link,"select * from tbaset where kode_aset='".$kode_aset."'");
    $res_cek_stok=mysqli_fetch_array($cek_stok);
	  $stok_barang= $res_cek_stok['stock'];
    $sekarang = date("d-m-Y"); 
    if($jumlah_pesanan>$stok_barang)
    {
    echo '<script>
         alert("Maaf Stok Barang tidak mencukupi untuk dipinjam,  Mohon cek Stok Barang yang tersedia dan coba kembali");
         window.location = "http://localhost/aset_peminjaman/daftarinventaris.php";
        </script>';
    
    }

    elseif (strtotime($tgl_peminjaman)<strtotime($sekarang)) {
      echo '<script>
         alert("Pemilihan tanggal peminjaman, kurang dari tanggal hari ini. Mohon cek tanggal dengan benar");
         window.location = "http://localhost/aset_peminjaman/daftarinventaris.php";
        </script>';
    }

     elseif (strtotime($tgl_pengembalian)<strtotime($sekarang)) {
      echo '<script>
         alert("Pemilihan tanggal pengembalian, kurang dari tanggal hari ini. Mohon cek tanggal dengan benar");
         window.location = "http://localhost/aset_peminjaman/daftarinventaris.php";
        </script>';
    }
    
    else
    { 
    	 $sql = "INSERT INTO tbpeminjaman (kodep,NIK,kode_aset,kegiatan,lokasi_kegiatan,jumlah_pesanan,tgl_peminjaman,tgl_pengembalian,statuspeminjaman) VALUES
     ('$kodep','$NIK','$kode_aset','$kegiatan','$lokasi_kegiatan','$jumlah_pesanan','$tgl_peminjaman','$tgl_pengembalian','$statuspeminjaman')";

    $sql1 = "UPDATE tbaset inner join tbpeminjaman on (tbpeminjaman.kode_aset=tbaset.kode_aset) SET tbaset.stock = (tbaset.stock - tbpeminjaman.jumlah_pesanan)
    WHERE tbaset.kode_aset = '".$kode_aset."' " ;

         $tambahdata = mysqli_query( $connection, $sql);
  		 $tambahdata = mysqli_query( $connection, $sql1);
          
          ?>


    <script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/menunggu.php";
        </script>
<?php }
  
  die();
  echo "Berhasil tambah data\n";
  mysqli_close($link);



?>