<?php
include('../connection.php');

            
    if(! get_magic_quotes_gpc() )
    {
    
        $kode_aset = addslashes ($_POST['kode_aset']);
        $jns = addslashes ($_POST['jns']);
        $no_kendaraan = addslashes ($_POST['no_kendaraan']);
        $merk = addslashes ($_POST['merk']);
        $thn_pembuatan = addslashes ($_POST['thn_pembuatan']);
        $no_rangka = addslashes ($_POST['no_rangka']);
        $no_mesin = addslashes ($_POST['no_mesin']);
      
        $posisi = addslashes ($_POST['posisi']);
        $NIK = addslashes ($_POST['NIK']);
        $status = addslashes ($_POST['status']);
        
    }


    else
    {
   
        $kode_aset = addslashes ($_POST['kode_aset']);
        $jns = addslashes ($_POST['jns']);
        $no_kendaraan = addslashes ($_POST['no_kendaraan']);
        $merk = addslashes ($_POST['merk']);
        $thn_pembuatan = addslashes ($_POST['thn_pembuatan']);
        $no_rangka = addslashes ($_POST['no_rangka']);
        $no_mesin = addslashes ($_POST['no_mesin']);
       
        $posisi = addslashes ($_POST['posisi']);
        $NIK = addslashes ($_POST['NIK']);
        $status = addslashes ($_POST['status']);
    
    }
        

    $sql = "INSERT INTO tbkendaraan (kode_aset,jns,no_kendaraan,merk,thn_pembuatan,no_rangka,no_mesin,posisi,NIK) VALUES
     ('$kode_aset','$jns','$no_kendaraan','$merk','$thn_pembuatan','$no_rangka','$no_mesin','$posisi','$NIK')";

       $sql1 = "UPDATE tbaset SET status='$status' WHERE kode_aset='$kode_aset' " ;
   
    $tambahdata = mysqli_query( $connection, $sql);
      
    

    if(! $tambahdata)
    {
    die('Gagal Tambah Data: ' . mysqli_error($connection));
    }
    else
    { 

          $tambahdata1 = mysqli_query( $connection, $sql1);
          
          ?>

        <script>
         alert("Data Berhasil Ditambahkan");
         window.location = "http://localhost/aset_peminjaman/kendaraan.php";
        </script>
<?php }
    
    die();
    echo "Berhasil tambah data\n";
    mysqli_close($link);


?>