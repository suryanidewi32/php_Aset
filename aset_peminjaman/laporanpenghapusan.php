<?php
include('cekmanajerakun.php');
include('connection.php');
?>


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Laporan Aset</title>
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css"  rel="stylesheet">
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
                <img src="img/manajer.jpg" class="img-responsive" alt="">
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
             <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em> Reports <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="pilihaset.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Report
                    </a></li>
                     <li><a class="" href="laporanpenyusutan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Depreciaton Report
                    </a></li>
                    <li><a class="active" href="laporanpenghapusan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Deletion Report
                    </a></li>
                   <li><a class="" href="laporanunproq.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Unapproved Procurement Report
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
				<li class="active">Asset Report</li>
                  <li >
<?php
$tgl=date('l, d-m-Y');
echo $tgl;
?></li>
			</ol>
		</div><!--/.row-->
		
	 <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div>
				
					
		

		
		       <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" align="center" >
                        Asset Deletion Report
                        </div>

                    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
       
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">
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
		    </thead>
            <tbody>
		<?php

			$result=mysqli_query($connection, "SELECT tbaset.kode_aset,tbpenghapusan.tgl_penghapusan,tbaset.nama_aset,tbaset.kelompok_aset,tbaset.harga_beli,tbpenghapusan.metode_penghapusan,tbpenghapusan.nilai_residu, tbpenghapusan.nama_penerima,tbpengadaan.posisi, tbpengadaan.merk , tbaset.stock1
FROM tbaset
INNER JOIN tbpenghapusan ON tbpenghapusan.kode_aset=tbaset.kode_aset
INNER JOIN tbpengadaan ON tbpengadaan.kode_aset=tbpenghapusan.kode_aset");
			
			$no=1;
            $total=0;
				while ($data = mysqli_fetch_array($result))
			
				{
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
				      $no=$no+1;
               
                    $total=$total+$data['nilai_residu'];
      }
    ?></tbody>
    <tr><td></td></tr>
          <tr class ="active">

         <th> Jumlah Pemasukan </th> <td> <td> <td><td><td><td><td><th></th></td></td></td></td></td> </td></td>
            <th> Rp.<?php echo number_format ($total ,0,",",".") ; ?></th>
            <th></th><th></th>     
          </tr>
        
              </table>
    <br><br>
    <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#cetakpdfff"><i class=" fa fa-print"></i> Print by Year</a>
                 
        <?php
        include "modalcetakpeghapusan.php";
        ?>
		 				
		</div></div></div></div>


				</div>
			</div><!-- /.col-->
			 <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>
	

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
     <script type="text/javascript">
  
    function cetakpdfff(){

      var tgl_a = $('#tgl_a').val();
      var tgl_b = $('#tgl_b').val();

      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/cetakpenghapusan.php?tgl_a="+tgl_a+"&tgl_b="+tgl_b;

      window.open(urlcetak,'_self');
    }
</script>
    
</body>
</html>