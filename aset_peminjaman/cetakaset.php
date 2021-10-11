<?php ob_start(); ?>

 <?php 
 		 $startdate = $_GET['tgl_a'];
 		 $enddate = $_GET['tgl_b'];

 		 if(isset($startdate) && isset($enddate) ){

 		 $where = "and tgl_beli>='".$startdate."'and tgl_beli<='".$enddate."'";

 		 }

          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result=mysqli_query($con, "SELECT tbaset.kode_aset, tbpengadaan.nama_aset, tbpengadaan.kelompok_aset, tbaset.tgl_input, tbaset.tgl_beli,tbaset.penyedia_jasa, tbaset.lokasi_pembelian, tbaset.kondisi_aset, tbpengadaan.harga , tbaset.stock1
        FROM tbaset 
        INNER JOIN tbpengadaan ON tbpengadaan.kode_aset=tbaset.kode_aset
        WHERE tbaset.status in ('Tersedia', '')".$where);
           ?>
<html>
<head>
    <title>Fixed Asset</title>
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
                <th>Tanggal Input</th>
        <th>Kode Aset</th>
              <th>Nama</th>
        <th>Kelompok</th>
                <th>Tanggal Beli</th>
              <th>Penyedia Jasa</th>
        <th>Lokasi Pembelian</th>
        <th>Kondisi</th>
        <th>Harga</th>

          </tr>
          <?php 
          $no=1;
          $total=0;
           if(@$_POST['cetakaset']){
            $result = $result->result(@$_POST['tgl_a'], @$_POST['tgl_b']);
          } while ($data = mysqli_fetch_assoc($result)) 
          
        {
        echo "    
          <tr>
                     <td>".$data['tgl_input']."</td>
          <td>".$data['kode_aset']."</td>
          <td>".$data['nama_aset']."</td>
          <td>".$data['kelompok_aset']."</td>
          <td>".$data['tgl_beli']."</td>
          <td>".$data['penyedia_jasa']."</td>
          <td>".$data['lokasi_pembelian']."</td>
          <td>".$data['kondisi_aset']."</td>
          <td>Rp.".number_format($data['stock1']*$data['harga'],0,",",".")."</td>

          
          </tr> 
          ";
          $no=$no+1;
           $total=$total+$data['stock1']*$data['harga'];
        }
  
    ?>
            <tr>
            <th>Jumlah Pengeluaran</th>
            <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
             <th>Rp.<?php echo number_format ($total ,0,",",".") ; ?></th>
           </tr>
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
$pdf->Output('Data Aset.pdf', 'D');
?>

<?php

?>