 <?php 
          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result = mysqli_query($con,"SELECT tbpengadaan.nama_aset, tbpengadaan.kelompok_aset, tbpengadaan.merk, tbpengadaan.posisi, tbpengadaan.tujuan, tbpengadaan.stock1, tbpengadaan.harga, tbpengadaan.tgl_pengajuan, tbuser.nama_user, tbpengadaan.keterangan
                FROM tbpengadaan
                INNER JOIN tbuser ON tbuser.NIK=tbpengadaan.NIK
                WHERE status ='Tidak'");
           ?>
<html>
<head>
    <title>Penghapusan Aset Tetap</title>
    <link href="bower_components/font-awesome/css/font-awesome.min.css">
   
<style type="css/style">
.table; { border-collapse:collapse; width: 100%;}
.table th {  padding:5px; background-color:#2F4F4F; color:#fff;}
.table td {  }

</style>

  
</head>
<body>

  <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>

<h1 align="center">FIXED ASSET MANAGEMENT</h1><br>
<p align="center">LAPORAN PENOLAKAN PENGAJUAN ASET BARU</p>
<p align="center"> PT METIS TEKNOLOGI CORPORINDO </p>
<p align="center"> Jalan Agung Sedayu Square L57
Outer ring road lingkar luar
Cengkareng Barat
Jakarta Barat 11730 </p><hr>

<br>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-2">
          <table class="table" border="1" cellpadding="8" align="center">
         
           
           <tr align="center">
   <th >No</th>
                <th>Nama Aset</th>
                <th>Kelompok Aset</th>
                <th>Merk</th>
                <th> Posisi</th>
                <th>Tujuan</th>
                <th>Jumlah Barang</th>
                <th>Perkiraan Harga</th>
                <th>Tanggal Pengajuan</th>
                <th>Nama Pengaju</th>
                <th>Keterangan</th>
               
          </tr>
          <?php 
           $no=1;
         
           while ($row = mysqli_fetch_assoc($result)) : ?>
           <tr align="center">
             <td ><?=$no++?></td>
             <td><?=$row['nama_aset']; ?></td>
             <td><?=$row['kelompok_aset']; ?></td>
             <td><?=$row['merk']; ?></td>
             <td><?=$row['posisi']; ?></td>
             <td><?=$row['tujuan']; ?></td>
             <td><?=$row['stock1']; ?></td>
             <td > Rp. <?=number_format ($row['harga'],0,",",".") ?></td>
             <td><?=$row['nama_user']; ?></td>
             <td><?=$row['tgl_pengajuan']; ?></td>
             <td><?=$row['keterangan']; ?></td></tr>
           <?php endwhile; ?>
          </table>
    </div>
  </div>
</div>


<p align="right"></p>
</body>
</html>