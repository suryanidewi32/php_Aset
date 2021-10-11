<?php
include('cekpetugas.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Aset</title>
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
               
                    </li>
                </ul>
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
                <ul class="children collapse active" id="sub-item-2">
                    <li><a class="active" href="fixedasset.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>Asset Data
                    </a></li>
                     <li><a class="" href="pilihtahun.php">
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
				<li class="active">Aset</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12">
				<h1 class="page-header">Table</h1>
			</div>
		</div>
				
		 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Assets Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>Tanggal Input</th>
				<th>Kode Aset</th>
            	<th>Nama</th>
				<th>Kelompok</th>
                <th>Tanggal Beli</th>
            	<th>Penyedia Jasa</th>
				<th>Lokasi Pembelian</th>
				<th>Kondisi</th>
				<th>Harga</th>
               
            

                <th>Action</th>
                
			</tr>
		</thead>
        <tbody>
		<?php

			$result=mysqli_query($connection, "
        SELECT tbaset.kode_aset, tbpengadaan.nama_aset, tbpengadaan.kelompok_aset, tbaset.tgl_input, tbaset.tgl_beli,tbaset.penyedia_jasa, tbaset.lokasi_pembelian, tbaset.kondisi_aset, tbpengadaan.harga , tbaset.stock1
        FROM tbaset 
        INNER JOIN tbpengadaan ON tbpengadaan.kode_aset=tbaset.kode_aset
        WHERE tbaset.status in ('Tersedia', '')");
			
			$no=1;
				while ($data = mysqli_fetch_array($result))
			
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

					
					<td><a href='penyusutann.php?kode_aset=$data[kode_aset]'>
                    <i class='fa fa-folder-open' data-toggle='tooltip' title='Depreciation'></i></a>

                    <a href='editdataaset.php?kode_aset=$data[kode_aset]'>
                    <i class='fa fa-edit btn-success' data-toggle='tooltip' title='Edit Data' ></i></a>


                    <a href='tambahpenghapusan.php?kode_aset=$data[kode_aset]'>
                    <i class='fa fa-plus btn-default' data-toggle='tooltip' title='Deletion Asset'></i></a>

                    </td>

					</tr> 
					";
					$no=$no+1;
				}
	
		?>
		</tbody>

              </table>
              <br>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
   


<!-- /.col-->
			
			
        <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>

	

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

	
</body>
</html>