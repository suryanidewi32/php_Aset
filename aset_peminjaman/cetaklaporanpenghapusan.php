 <?php 
          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result = mysqli_query($con,"SELECT tbaset.kode_aset,tbaset.tgl_input,tbaset.nama_aset,tbaset.kelompok_aset,tbaset.tgl_beli,tbaset.harga_beli,tbpenghapusan.metode_penghapusan,tbpenghapusan.nilai_residu FROM tbaset
                INNER JOIN tbpenghapusan ON tbpenghapusan.kode_aset=tbaset.kode_aset");
           ?>
<html>
<head>
    <title>Penghapusan Aset Tetap</title>
    <link href="bower_components/font-awesome/css/font-awesome.min.css">
   
<style type="css/style">
.table; { border-collapse:collapse; width: 100%;}
.table th {  padding:10px; background-color:#2F4F4F; color:#fff;}
.table td {  padding:8px; }

</style>

  
</head>
<body>

  <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>

<h1 align="center">FIXED ASSET MANAGEMENT</h1><br>
<p align="center">LAPORAN PENGHAPUSAN ASET TETAP</p>
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
    <th>No</th>
                <th>Tanggal Input</th>
                <th>Tanggal Beli</th>
                <th>Kode Aset</th>
                <th>Nama</th>
                <th>Kelompok</th>
                <th>Harga Awal</th>
                <th>Metode Penghapusan</th>
                <th>Perkiran Harga Jual</th>
          </tr>
          <?php 
           $no=1;
         
           while ($row = mysqli_fetch_assoc($result)) : ?>
           <tr align="center">
             <td ><?=$no++?></td>
             <td><?=$row['tgl_input']; ?></td>
             <td><?=$row['tgl_beli']; ?></td>
             <td><?=$row['kode_aset']; ?></td>
             <td><?=$row['nama_aset']; ?></td>
             <td><?=$row['kelompok_aset']; ?></td>
             <td > Rp. <?=number_format ($row['harga_beli'],0,",",".") ?></td>
             <td><?=$row['metode_penghapusan']; ?></td>
             <td><?=$row['nilai_residu']; ?></td>
           </tr>
           <?php endwhile; ?>
          </table>
    </div>
  </div>
</div>


<p align="right"></p>
</body>
</html>