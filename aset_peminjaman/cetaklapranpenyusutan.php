 <?php 
          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result=mysqli_query($con, "SELECT * FROM tbaset");
           ?>
<html>
<head>
    <title>Penyusutan</title>
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
<p align="center">LAPORAN PENYUSUTAN ASET TETAP</p>
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
                <th >No</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Kelompok Aset</th>
                <th>Tanggal Beli</th>
                <th>Masa Manfaat</th>
                <th>Kelompok</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>

          </tr>
          <?php 
          $no=1;
           if(@$_POST['cetakpenyusutan']){
            $result = $result->result(@$_POST['tgl_a'], @$_POST['tgl_b']);
          } while ($row = mysqli_fetch_assoc($result)) : ?>
           <tr>

       
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['tgl_beli']; ?></td>
             <td align="center"><?=$row['masa_perkiraan']; ?></td>
             <td align="center"><?=$row['nama_aktiva']; ?></td>
             <td align="center"><?=$row['stock']; ?></td>
             <td align="center"> Rp. <?=number_format ($row['harga_beli'],0,",",".") ?></td>
              
            
           </tr>
           <?php endwhile; ?>
          </table>
    </div>
  </div>
</div>


<p align="right"></p>


</body>
</html>