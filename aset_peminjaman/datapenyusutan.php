<?php
include('cekpetugas.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Data Aset</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

  
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

	<script>
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip(); 
			});
		</script>
        <script type="text/javascript" language="JavaScript">
			function konfirmasi()
			{
				tanya = confirm("Anda Yakin Akan Menghapus Data Ini ?");
			if (tanya == true)
			return true;
			
			else 
			return false;
			}
		</script>
       
</head>



<!--Header-->
<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Fixed Aset Manajemen</span></a>
                
            </div>
        </div><!-- /.container-fluid -->
    </nav>
<!--Tutup Header-->

    <!--sidebar-->
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="img/pegawai.png" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                </div>
                 <div class="profile-usertitle-name"><?php echo $_SESSION['username']; ?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        
        <ul class="nav menu">
            <li class=""><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
           <li><a href="newaset.php"><em class="fa fa-edit">&nbsp;</em> New Asset Data</a></li>
             <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em> Component <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="fixedasset.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Data
                    </a></li>
                     <li><a class="active" href="datapenyusutan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Depreciation Data
                    </a></li>
                    <li><a class="" href="penghapusan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Deletion Data
                    </a></li>
                </ul>
            </li>
                   <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
    <!--Tutup Sidebar-->
		

	<!-- tabel aset -->	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Asset</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12">
				<h1 class="page-header"></h1>
			</div>
		</div>
				
		 <div class="row">
        <div class="col-xs-12">
<div class="box">

            <div class="box-header">
              <h3 class="box-title"> Asset Data</h3>

            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <a href='pilihtahun.php'>
                    <button class='btn btn-outline-info btn-sm btn-default' data-toggle='tooltip' title='pilih tahun'> Select by Year
                    </button></a>
                  </div>
                  <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead> 
                <tr class="success">
                <th >No</th>
				        <th>Kode Aset</th>
            	  <th>Nama Aset</th>
				        <th>Kelompok Aset</th>
                <th>Tanggal Beli</th>
            	  <th>Masa Manfaat</th>
				        <th>Kelompok Harta</th>
				        <th>Jumlah Barang</th>
				        <th>Harga Barang</th>
                <th>Total Harga Barang</th>
                <th>Nilai Buku Perbulan</th>
                <th>Nilai Buku Pertahun</th>
                <th>Nilai Buku Tahun Ini</th>
                
			</tr>
		</thead>
        <tbody>
		<?php ob_start(); ?>

     <?php 
     $startdate = $_GET['tgl_a'];
     $enddate = $_GET['tgl_b'];
     $kelaset= $_GET['kel'];

     if(isset($startdate) && isset($enddate) ){

     $where = "where tgl_beli>='".$startdate."'and tgl_beli<='".$enddate."'and kelompok_aset<='".$kelaset."'";

     }
       $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
			$result=mysqli_query($connection, "SELECT * FROM tbaset ".$where);
			
			$no=1;
      $total=0;
      $total1=0;
      $totalnilaiperbulan=0;
      $totalnilaipertahun=0;
      $totalnilaitahunini=0;
			 if(@$_POST['datapenyusutan']){
            $result = $result->result(@$_POST['tgl_a'], @$_POST['tgl_b'], @$_POST['kel']);
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
    ?></tbody>
    <tr><td></td></tr>
          <tr class ="active">

          <th> Jumlah:</th><td> <td> <td> <td> <td> <td><td><td></td></td></td></td></td></td></td></td>
            <th> Rp.<?php echo number_format ($total ,0,",",".") ; ?></th>
                 <th> Rp.<?php echo number_format ($totalnilaiperbulan ,0,",",".") ; ?></th>
                    <th> Rp.<?php echo number_format ($totalnilaipertahun ,0,",",".") ; ?></th>
                     <th> Rp.<?php echo number_format ($totalnilaitahunini ,0,",",".") ; ?></th>
          </tr>
		
              </table>

          
              <br>
     <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#cetakpdf"><i class=" fa fa-print"></i> Cetak PDF</a>
                 
        <?php
        include "modalcetakpenyusutan.php";
        ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        <!-- /.col -->
     
    <!-- /.content -->
 
		



				</div>
			</div><!-- /.col-->
			
			 <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div><!--/.main-->
	

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">
  
    function cetakpdf(){

      var tgl_a = $('#tgl_a').val();
      var tgl_b = $('#tgl_b').val();
      var kell = $('#kell').val();
      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/cetakpenyusutan.php?tgl_a="+tgl_a+"&tgl_b="+tgl_b+"&kell="+kell;

      window.open(urlcetak,'_self');
    }

</script>
</body>
</html>