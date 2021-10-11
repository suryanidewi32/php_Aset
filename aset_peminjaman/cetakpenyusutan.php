<?php ob_start(); ?>

 <?php 
 		 $startdate = $_GET['tgl_a'];
 		 $enddate = $_GET['tgl_b'];
     $kelasset = $_GET['kell'];

 		 if(isset($startdate) && isset($enddate) ){

 		 $where = "where tgl_beli>='".$startdate."'and tgl_beli<='".$enddate."'and kelompok_aset<='".$kelasset."'";

 		 }

          $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
          $result=mysqli_query($con, "SELECT * FROM tbaset ".$where);
           ?>
<html>
<head>
    <title>Penyusutan</title>
    <link href="bower_components/font-awesome/css/font-awesome.min.css">
   
<style type="css/style">
.table; { border-collapse:collapse; width: 100%;}
.table th {  padding:5px; background-color:#808080; color:#fff;}
.table td {  padding:4px; }

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
<p align="center"><?php echo $kelasset?></p>
<br>
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
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Nilai Buku Perbulan</th>
                <th>Nilai Buku Pertahun</th>
                <th>Nilai Buku Tahun Ini</th>
          </tr>
          <?php 
            $no=1;
      $total=0;
      $total1=0;
      $totalnilaiperbulan=0;
      $totalnilaipertahun=0;
      $totalnilaitahunini=0;
       if(@$_POST['cetakpenyusutan']){
             $result = $result->result(@$_POST['tgl_a'], @$_POST['tgl_b'], @$_POST['kell']);
           } while ($data = mysqli_fetch_assoc($result)) 
          
        {

        $date1 = new DateTime();
        $date2 = new DateTime($data['tgl_beli']);
        $date_diff = date_diff($date1,$date2);
        $nilai_tahun_ini = 0;
        switch($data['nama_aktiva']){

            case 1 :  $nilai_pertahun = $data['stock1']*$data['harga_beli']*0.25 ;
                      $nilai_perbulan= (4/12)*$data['stock1']*$data['harga_beli'];

                      if($date_diff->y<4){
                      $nilai_tahun_ini= $nilai_pertahun*$date_diff->y;  
                      }
                      break;
            case 2 :  $nilai_pertahun = $data['stock1']*$data['harga_beli']*12.5;
                      $nilai_perbulan= (8/12)*$data['stock1']*$data['harga_beli'];

                      if($date_diff->y<8){
                      $nilai_tahun_ini= $nilai_pertahun*$date_diff->y;  
                      }

                      break;
            case 3 :  $nilai_pertahun = $data['stock1']*$data['harga_beli']*6.25;
                      $nilai_perbulan= (16/12)*$data['stock1']*$data['harga_beli'];
                      $nilai_tahun_ini= $date_diff;
                      if($date_diff->y<16){
                      $nilai_tahun_ini= $nilai_pertahun*$date_diff->y;  
                      }
                      break;
            case 4 :  $nilai_pertahun = $data['stock1']*$data['harga_beli']*0.05;
                      $nilai_perbulan= (20/12)*$data['stock1']*$data['harga_beli'];
                      $nilai_tahun_ini= $date_diff;
                      if($date_diff->y<20){
                      $nilai_tahun_ini= $nilai_pertahun*$date_diff->y;  
                      }
                      break;
            default : break;
        }



        echo "    
          <tr>
          <td>".$no."</td>
          <td>".$data['kode_aset']."</td>
          <td>".$data['nama_aset']."</td>
          <td>".$data['kelompok_aset']."</td>
          <td>".$data['tgl_beli']."</td>
          <td>".$data['masa_perkiraan']."</td>
          <td>".$data['nama_aktiva']."</td>
          <td>".$data['stock1']."</td>
          <td>Rp.".number_format($data['harga_beli'],0,",",".")."</td>
                    <td>Rp.".number_format($data['stock1']*$data['harga_beli'],0,",",".")."</td>
                    <td>Rp.".number_format($nilai_perbulan,0,",",".")."</td>
                    <td>Rp.".number_format($nilai_pertahun,0,",",".")."</td>
                    <td>Rp.".number_format($nilai_tahun_ini,0,",",".")."</td>
          </tr> 
          ";
          $no=$no+1;
                    $total=$total+($data['stock1']*$data['harga_beli']);
                    $totalnilaiperbulan=$totalnilaiperbulan+($nilai_perbulan);
                    $totalnilaipertahun=$totalnilaipertahun+($nilai_pertahun);
                    $totalnilaitahunini=$totalnilaitahunini+($nilai_tahun_ini);
      }
    ?>
    <tr>

          <th> Jumlah :</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
            <th> Rp.<?php echo number_format ($total ,0,",",".") ; ?></th>
                 <th> Rp.<?php echo number_format ($totalnilaiperbulan ,0,",",".") ; ?></th>
                    <th> Rp.<?php echo number_format ($totalnilaipertahun ,0,",",".") ; ?></th>
                     <th> Rp.<?php echo number_format ($totalnilaitahunini ,0,",",".") ; ?></th>
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
$pdf->Output('Data Penyusutan Aset.pdf', 'D');
?>
