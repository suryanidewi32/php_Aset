<?php
include('cekperlengkapan.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Halaman Petugas Barang</title>
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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

	<script type="text/javascript">
      function validasi_input(form){
      if (form.kodep.value != ""){
        var x = (form.kodep.value);
      var mincar = 5;
        var status = true;
        var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        for (i=0; i<=x.length-1; i++)
        {
        if (x[i] in list) cek = true;
        else cek = false;
      }

      }
      if (form.kodep.value == ""){
          alert("Kode Peminjaman harus diisi!");
          form.kodep.focus();
          return (false);
        }

      if (form.statuspeminjaman.value == "pilih"){
          alert("Status harus diisi!");
          form.statuspeminjaman.focus();
          return (false);
        }
     

        if (form.keterangan.value == "pilih"){
          alert("Keterangan harus diisi!");
          form.keterangan.focus();
          return (false);
        }

        return (true);
        }
  </script>
    <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip(); 
      });
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
                <img src="img/pegawaiumum.png" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"><?php echo $_SESSION['username']; ?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
       
        <ul class="nav menu">
            <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class=" parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-edit">&nbsp;</em> New Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="newbarang.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> New Barang
                    </a></li>
                    <li><a class="" href="newkendaraan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> New Kendaraan
                    </a></li>
                    <li><a class="" href="newgedung.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> New Gedung
                    </a></li>
                </ul>
            </li>
             <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em> Components <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="barang.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Data Barang
                    </a></li>
                    <li><a class="" href="kendaraan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Data Kendaraan
                    </a></li>
                    <li><a class="" href="gedung.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Data Gedung
                    </a></li>
                </ul>
            </li>
             <li class=""><a href="posisibarang.php"><em class="fa  fa-location-arrow">&nbsp;</em> Posisi Barang Peminjaman</a></li>
            <li class=""><a href="jadwal.php"><em class="fa  fa-calendar">&nbsp;</em> Jadwal Peminjaman</a></li>
            <li class=""><a href="lappengembalian.php"><em class="fa   fa-rotate-right ">&nbsp;</em> Laporan Pengembalian Barang</a></li>
             <li class=""><a href="buy.php"><em class="fa   fa-history ">&nbsp;</em> History Pembelian</a></li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
    
    <!--Tutup Sidebar-->
    
		

	<!-- header Barang -->	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Cancel Peminjaman Barang Inventaris Oleh Petugas </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form</h1>
			</div>
		</div>
		<!-- end header Barang -->		
					
		<!-- form  Barang -->
		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-default">
				<div class="panel-heading">
						Form Cancel
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
                        <?php 
                        $kodep=$_GET['kodep'];
        ?>
		  <form class="form-horizontal" action='proses/prosescancelpetugas.php' method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <fieldset>
         

         	  <div class="form-group">
            <label class="col-md-3 control-label" for="kodep">Kode Peminjaman*</label>
            <div class="col-md-9">
            <input type="text" id="kodep" name="kodep" value="<?=$kodep ?>" class="form-control" readonly>
            </div>
            </div>


            <div class="form-group">
            <label class="col-md-3 control-label" for="statuspeminjaman">Status*</label>
            <div class="col-md-9">
            <select name="statuspeminjaman" class="form-control">
            <option value="pilih" selected>-- Pilih Tidak di Setujui --</option>
            <option value="Tidak di Setujui">Tidak di Setujui</option>       
            </select>
            
            </div></div>

           
            <div class="form-group">
            <label class="col-md-3 control-label" for="keterangan">Keterangan*</label>
            <div class="col-md-9">
            <select name="keterangan" class="form-control">
            <option value="pilih" selected>-- Pilih Tidak di Setujui --</option>
            <option value="Tidak di Setujui">Tidak di Setujui</option>       
            </select>
            
            </div></div>

          <br>
            			 <div class="controls">
              <button class="btn btn-primary  btn-md pull-right" name="simpan">Approve</button>
            </div>
          </div>  
							</fieldset>
						</form>


					</div>
				</div>
			</div><!--/.col-->


			  <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>


	
   
    
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <script>
    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
    </script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>