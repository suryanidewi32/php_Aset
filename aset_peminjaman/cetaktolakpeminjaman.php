<?php ob_start(); ?>

 <?php 
 		 $startdate = $_GET['tgl_c'];
 		 $enddate = $_GET['tgl_d'];

 		 if(isset($startdate) && isset($enddate) ){

 		  $where = "and tgl_peminjaman>='".$startdate."'and tgl_peminjaman<='".$enddate."'";

 		 }

          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result=mysqli_query($con, "SELECT tbpeminjaman.kodep,tbpeminjaman.kode_aset,tbpeminjaman.NIK,tbpeminjaman.kode_aset, tbaset.kelompok_aset, tbaset.nama_aset, tbpeminjaman.kegiatan, tbpeminjaman.lokasi_kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian,tbpeminjaman.keteranganmanajer 
            FROM tbpeminjaman 
            INNER JOIN tbaset ON tbaset.kode_aset=tbpeminjaman.kode_aset
            WHERE keterangan ='Tidak di Setujui'".$where);
           ?>
<html>
<head>
    <title>Peminjaman</title>
    <link href="bower_components/font-awesome/css/font-awesome.min.css">
   
<style type="css/style">
.table; { border-collapse:collapse; width: 100%;}
.table th {  padding:8px; background-color:#808080; color:#fff;}
.table td { }

</style>

  
</head>
<body>

  <p align="right"><?php
$tgl=date('l, d-m-Y');
echo $tgl;
?></p>

<h4 align="center">DAFTAR INVENTARIS 
<br><br> LAPORAN PEMINJAMAN BARANG INVENTARIS

<br>Per Tahun  <?php $tgl=date('Y'); echo $tgl;?></h4>
<p align="center">PT METIS TEKNOLOGI CORPORINDO 
<br>Jalan Agung Sedayu Square L57
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
                <th>Kode Peminjaman</th>
                <th>NIK</th>
                <th>Kode Barang</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Kegiatan</th>
                <th>Lokasi Kegiatan</th>
                <th>Jumlah Pesanan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Keterangan</th>
                

          </tr>
          <?php 
          $no=1;
           if(@$_POST['cetaktolakpeminjaman']){
            $result = $result->result(@$_POST['tgl_c'], @$_POST['tgl_d']);
          } while ($row = mysqli_fetch_assoc($result)) : ?>
           <tr>

       
            <td align="center"><?=$no++?></td>
             <td align="center"><?=$row['kodep']; ?></td>
             <td align="center"><?=$row['NIK']; ?></td>
             <td align="center"><?=$row['kode_aset']; ?></td>
             <td align="center"><?=$row['kelompok_aset']; ?></td>
             <td align="center"><?=$row['nama_aset']; ?></td>
             <td align="center"><?=$row['kegiatan']; ?></td>
             <td align="center"><?=$row['lokasi_kegiatan']; ?></td>
             <td align="center"><?=$row['jumlah_pesanan']; ?></td>
             <td align="center"><?=$row['tgl_peminjaman']; ?></td>
             <td align="center"><?=$row['tgl_pengembalian']; ?></td> 
             <td align="center"><?=$row['keteranganmanajer']; ?></td> 
             </tr>
           <?php endwhile; ?>
          </table>
    </div>
  </div>
</div>


<p align="right"></p>
</body>
</html>
<?php

$html = ob_get_contents();
        ob_end_clean();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L','A3','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Peminjaman.pdf', 'D');
?>

<?php

?>