 <?php 
          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result=mysqli_query($con, "SELECT daftarinventaris.kode_aset, tbaset.kelompok_aset, daftarinventaris.jns, tbaset.nama_aset, daftarinventaris.merk, tbaset.stock1, daftarinventaris.posisi
                FROM daftarinventaris
                INNER JOIN tbaset ON tbaset.kode_aset = daftarinventaris.kode_aset
                WHERE jns in ('Bangku','Meja')");

          $result3=mysqli_query($con, "SELECT daftarinventaris.kode_aset, tbaset.kelompok_aset, daftarinventaris.jns, tbaset.nama_aset, daftarinventaris.merk, tbaset.stock1, daftarinventaris.posisi
                FROM daftarinventaris
                INNER JOIN tbaset ON tbaset.kode_aset = daftarinventaris.kode_aset
                WHERE jns in ('DSLR','Handycam')");

          $result4=mysqli_query($con, "SELECT daftarinventaris.kode_aset, tbaset.kelompok_aset, daftarinventaris.jns, tbaset.nama_aset, daftarinventaris.merk, tbaset.stock1, daftarinventaris.posisi
                FROM daftarinventaris
                INNER JOIN tbaset ON tbaset.kode_aset = daftarinventaris.kode_aset
                WHERE jns in ('Mesin Penghancur Kertas')");

          $result5=mysqli_query($con, "SELECT daftarinventaris.kode_aset, tbaset.kelompok_aset, daftarinventaris.jns, tbaset.nama_aset, daftarinventaris.merk, tbaset.stock1, daftarinventaris.posisi
                FROM daftarinventaris
                INNER JOIN tbaset ON tbaset.kode_aset = daftarinventaris.kode_aset
                WHERE jns in ('Layar Infocus','Ac','Printer')");

           $result6=mysqli_query($con, "SELECT daftarinventaris.kode_aset, tbaset.kelompok_aset, daftarinventaris.jns, tbaset.nama_aset, daftarinventaris.merk, tbaset.stock1, daftarinventaris.posisi
                FROM daftarinventaris
                INNER JOIN tbaset ON tbaset.kode_aset = daftarinventaris.kode_aset
                WHERE jns in ('It Equipment')");


          $result1=mysqli_query($con, "SELECT tbkendaraan.kode_aset, tbaset.kelompok_aset, tbkendaraan.jns, tbaset.nama_aset, tbkendaraan.merk, tbkendaraan.no_kendaraan, tbkendaraan.thn_pembuatan, tbkendaraan.no_rangka, tbkendaraan.no_mesin, tbkendaraan.posisi
                FROM tbkendaraan
                INNER JOIN tbaset ON tbaset.kode_aset = tbkendaraan.kode_aset   ");


          $result2=mysqli_query($con, "SELECT tbgedung.kode_aset, tbaset.nama_aset, tbaset.kelompok_aset, tbgedung.luas_gedung,tbgedung.posisi
                FROM tbgedung
                INNER JOIN tbaset ON tbaset.kode_aset = tbgedung.kode_aset  ");
           ?>
<html>
<head>
    <title>DIR</title>
    <link href="bower_components/font-awesome/css/font-awesome.min.css">
   
<style type="css/style">
.table; { border-collapse:collapse; width: 100%;}
.table th {  padding:8px; background-color:#808080; color:#fff; text-align: center;}
.table td { }

</style>

  
</head>
<body>

  <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>

<p align="center">LAPORAN DAFTAR INVENTARIS
<br><br>PT METIS TEKNOLOGI CORPORINDO 
 <br>Jalan Agung Sedayu Square L57
Outer ring road lingkar luar
Cengkareng Barat
Jakarta Barat 11730 </p><hr>

<br>

<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-2">

       Gedung
          <table class="table table-bordered table-hover table-condensed" border="1" cellpadding="8">
         <tr class="info">

                <th>No</th>
                <th>Kode Gedung</th>
                <th>Kelompok</th>
                <th>Nama Gedung</th>
                <th>Luas Gedung</th>
                <th>Posisi</th>
            </tr>

             <?php 
          $no=1;
          while ($row = mysqli_fetch_assoc($result2)) : ?>
           <tr>
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['luas_gedung']; ?></td>
              <td align="center"><?=$row['posisi']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table><br><hr>

          Barang
          <table class="table table-bordered table-striped table-condensed" border="1" cellpadding="8">
          <tr class="info">

                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Stock</th>
                <th>Posisi</th>
            </tr>

          <?php 
          $no=1;
          while ($row = mysqli_fetch_assoc($result)) : ?>
           <tr>
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['jns']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['merk']; ?></td>
             <td align="center"><?=$row['stock1']; ?></td>
             <td align="center"><?=$row['posisi']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table><br><hr>

           Kamera
          <table class="table table-bordered table-striped table-condensed" border="1" cellpadding="8">
          <tr class="info">

                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Stock</th>
                <th>Posisi</th>
            </tr>

          <?php 
          $no=1;
          while ($row = mysqli_fetch_assoc($result3)) : ?>
           <tr>
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['jns']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['merk']; ?></td>
             <td align="center"><?=$row['stock1']; ?></td>
             <td align="center"><?=$row['posisi']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table><br><hr>

          Mesin
          <table class="table table-bordered table-striped table-condensed" border="1" cellpadding="8">
          <tr class="info">

                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Stock</th>
                <th>Posisi</th>
            </tr>

          <?php 
          $no=1;
          while ($row = mysqli_fetch_assoc($result4)) : ?>
           <tr>
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['jns']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['merk']; ?></td>
             <td align="center"><?=$row['stock1']; ?></td>
             <td align="center"><?=$row['posisi']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table><br><hr>

           It Equipment
          <table class="table table-bordered table-striped table-condensed" border="1" cellpadding="8">
          <tr class="info">

                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Stock</th>
                <th>Posisi</th>
            </tr>

          <?php 
          $no=1;
          while ($row = mysqli_fetch_assoc($result6)) : ?>
           <tr>
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['jns']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['merk']; ?></td>
             <td align="center"><?=$row['stock1']; ?></td>
             <td align="center"><?=$row['posisi']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table><br><hr>

           Barang
          <table class="table table-bordered table-striped table-condensed" border="1" cellpadding="8">
          <tr class="info">

                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Stock</th>
                <th>Posisi</th>
            </tr>

          <?php 
          $no=1;
          while ($row = mysqli_fetch_assoc($result)) : ?>
           <tr>
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['jns']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['merk']; ?></td>
             <td align="center"><?=$row['stock1']; ?></td>
             <td align="center"><?=$row['posisi']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table><br><hr>

          <br>
          Kendaraan
          <table class="table table-bordered table-hover table-condensed" border="1" cellpadding="8">
          <tr class="info">
                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>No. Kendaraan</th>
                <th>Tahun Pembuatan</th>
                <th>No. Rangka</th>
                <th>No. Mesin</th>
              
                <th>Posisi</th>
            </tr>

             <?php 
          $no=1;
          while ($row = mysqli_fetch_assoc($result1)) : ?>
           <tr>
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['jns']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['merk']; ?></td>
             <td align="center"><?=$row['no_kendaraan']; ?></td>
             <td align="center"><?=$row['thn_pembuatan']; ?></td>
             <td align="center"><?=$row['no_rangka']; ?></td>
             <td align="center"><?=$row['no_mesin']; ?></td>
            
             <td align="center"><?=$row['posisi']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table>
          <br>

          <br>

         
    </div>
  </div>
</div>


<p align="right"></p>
</body>
</html>