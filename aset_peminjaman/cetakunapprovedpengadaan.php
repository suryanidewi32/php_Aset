<?php ob_start(); ?>

 <?php 
     $startdate = $_GET['tgl_a'];
     $enddate = $_GET['tgl_b'];
  

     if(isset($startdate) && isset($enddate) ){

     $where = "and tgl_pengajuan>='".$startdate."'and tgl_pengajuan<='".$enddate."'";

     }

          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
   $result = mysqli_query($con,"SELECT tbpengadaan.nama_aset, tbpengadaan.kelompok_aset, tbpengadaan.merk, tbpengadaan.posisi, tbpengadaan.tujuan, tbpengadaan.stock1, tbpengadaan.harga, tbpengadaan.tgl_pengajuan, tbuser.nama_user, tbpengadaan.keterangan
                FROM tbpengadaan
                INNER JOIN tbuser ON tbuser.NIK=tbpengadaan.NIK
                WHERE status ='Tidak'".$where);
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
                <th>Harga Satuan</th>
                <th>Jumlah Harga</th>
                <th>Tanggal Pengajuan</th>
                <th>Nama Pengaju</th>
                <th>Keterangan</th>
               
          </tr>
          <?php 
           $no=1;
          if(@$_POST['cetakunpengadaan']){
            $result = $result->result(@$_POST['tgl_a'], @$_POST['tgl_b']);
          }
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['posisi']."</td>
                    <td>".$data['tujuan']."</td>
                    <td>".$data['stock1']."</td>
                    <td>Rp.".number_format($data['harga'],0,",",".")."</td>
                    <td>Rp.".number_format($data['stock1']*$data['harga'],0,",",".")."</td>
                    <td>".$data['tgl_pengajuan']."</td>
                    <td>".$data['nama_user']."</td>
                    <td>".$data['keterangan']."</td> 
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
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
$pdf->Output('Data Penolakan Pengadaan Aset.pdf', 'D');
?>