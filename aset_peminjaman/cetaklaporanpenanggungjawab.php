 <?php 
          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result = mysqli_query($con,"SELECT tbaset.kode_aset,tbaset.tgl_input,tbaset.nama_aset,tbaset.kelompok_aset,tbaset.kondisi_aset,tbaset.harga_beli,tbaset.penyedia_jasa,tbaset.lokasi_pembelian,tbuser.nama_user 
                FROM tbaset 
                INNER JOIN tbuser ON tbaset.NIK=tbuser.NIK");
           ?>
<html>
<head>
    <title>Penanggung Jawab</title>
    <link href="bower_components/font-awesome/css/font-awesome.min.css">
   
<style type="css/style">
.table; { border-collapse:collapse; width: 100%;}
.table th {  padding:10px; background-color:#808080; color:#fff;}
.table td {  padding:8px; }

</style>

  
</head>
<body>

  <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>

<h1 align="center">FIXED ASSET MANAGEMENT</h1><br>
<p align="center">LAPORAN ASET TETAP</p>
<p align="center"> PT METIS TEKNOLOGI CORPORINDO </p>
<p align="center"> Jalan Agung Sedayu Square L57
Outer ring road lingkar luar
Cengkareng Barat
Jakarta Barat 11730 </p><hr>

<br>

<div class="container">
  <div class="row">
    <div class="col-md-10 offset-md-2">
          <table class="table table-bordered table-hover table-condensed" border="1px" cellpadding="8" align="center">
         
           
          <tr align="center">
                <th>No</th>
                <th >Kode Aset</th>
                <th>Tanggal Input</th>
                <th>Nama</th>
                <th>Kelompok</th>
                <th>Kondisi</th>
                <th>Harga Beli</th>
                <th>Penyedia Jasa</th>
                <th>Lokasi Pembelian</th>
                <th>Nama Penginput</th>

          </tr>
          <?php 
          $no=1;
           while ($row = mysqli_fetch_assoc($result)) : ?>
           <tr>

       
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['tgl_input']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['kondisi_aset']; ?></td>
             <td align=""> Rp. <?=number_format ($row['harga_beli'],0,",",".") ?></td>
              <td align="center"><?=$row['penyedia_jasa']; ?></td>
             <td align="center"><?=$row['lokasi_pembelian']; ?></td>
             <td align="center"><?=$row['nama_user']; ?></td>
            
           </tr>
           <?php endwhile; ?>
            <tr>
            <th>Jumlah</th>
            <th></th><th></th><th></th><th></th><th></th>
             <th>Rp.<?php echo number_format ($total ,0,",",".") ; ?></th><th></th><th></th><th></th>
           </tr>
          </table>
    </div>
  </div>
</div>


<p align="right"></p>
</body>
</html>