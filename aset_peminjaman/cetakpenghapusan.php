<?php ob_start(); ?>

 <?php 
 		 $startdate = $_GET['tgl_a'];
 		 $enddate = $_GET['tgl_b'];

 		 if(isset($startdate) && isset($enddate) ){

 		 $where = "and tgl_penghapusan>='".$startdate."'and tgl_penghapusan<='".$enddate."'";

 		 }

          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
        $result = mysqli_query($con," SELECT tbaset.kode_aset,tbpenghapusan.tgl_penghapusan,tbaset.nama_aset,tbaset.kelompok_aset,tbaset.harga_beli,tbpenghapusan.metode_penghapusan,tbpenghapusan.nilai_residu, tbpenghapusan.nama_penerima,tbpengadaan.posisi, tbpengadaan.merk , tbaset.stock1
FROM tbaset
INNER JOIN tbpenghapusan ON tbpenghapusan.kode_aset=tbaset.kode_aset
INNER JOIN tbpengadaan ON tbpengadaan.kode_aset=tbpenghapusan.kode_aset
                ".$where);?>
        <html>
<head>
    <title>Penghapusan Aset Tetap</title>
    <link href="bower_components/font-awesome/css/font-awesome.min.css">
   
<style type="css/style">
.table; { border-collapse:collapse; width: 100%;}
.table th {  padding:5px; background-color:#2F4F4F; color:#fff;}
.table td {  padding:5px; }

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
        <th>Kode Aset</th>
        <th>Tanggal Penghapusan</th>
        <th>Nama Aset</th>
        <th>Kelompok Aset</th>
        <th>Harga</th>
        <th>Posisi Barang</th>
        <th>Merk</th>
                <th>Metode Penghapusan</th>
                <th>Harga Penghapusan</th>
                <th>Nama Penerima</th>
          </tr>
    <?php 
          $no=1;
           $total=0;
           if(@$_POST['cetakpenghapusan']){
            $result = $result->result(@$_POST['tgl_a'], @$_POST['tgl_b']);
          } while ($data = mysqli_fetch_assoc($result))  {
        echo "    
          <tr>
             
             <td>".$no."</td>
          <td>".$data['kode_aset']."</td>
          <td>".$data['tgl_penghapusan']."</td>
           <td>".$data['nama_aset']."</td>
           <td>".$data['kelompok_aset']."</td>
           <td>Rp.".number_format($data['stock1']*$data['harga_beli'],0,",",".")."</td>
           <td>".$data['posisi']."</td>
                     <td>".$data['merk']."</td>
          <td>".$data['metode_penghapusan']."</td>
                   <td>Rp.".number_format($data['nilai_residu'],0,",",".")."</td>
                     <td>".$data['nama_penerima']."</td>
                     
           </tr> 
          ";
          $no=$no+1;
                    $total=$total+($data['nilai_residu']);
                     }
    ?>
    <tr>
      <TH>Jumlah Pemasukan : </TH><TH></TH><TH></TH><TH></TH><TH></TH><TH></TH><th> </th><th></th><th></th>
                     <th> Rp.<?php echo number_format ($total ,0,",",".") ; ?></th><TH></TH>
         </tr> </table>
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
$pdf->Output('Data Penghapusan Aset Tetap.pdf', 'D');
?>

<?php

?>