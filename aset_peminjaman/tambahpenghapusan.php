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
</head>

	<script type="text/javascript">
      function validasi_input(form){
      if (form.kode_aset.value != ""){
        var x = (form.kode_aset.value);
      var mincar = 11;
        var status = true;
        var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        for (i=0; i<=x.length-1; i++)
        {
        if (x[i] in list) cek = true;
        else cek = false;
      }

         }

         if (form.kode_aset.value == ""){
          alert("Kode Aset harus diisi!");
          form.kode_aset.focus();
          return (false);
        }

         if (form.metode_penghapusan.value == "pilih"){
          alert("Metode Penghapusan harus diisi!");
          form.metode_penghapusan.focus();
          return (false);
        }

         if (form.status.value == "pilih"){
          alert("status harus diisi!");
          form.status.focus();
          return (false);
        }
      
      if (form.nilai_residu.value == ""){
          alert("Nilai Residu harus diisi!");
          form.nilai_residu.focus();
          return (false);
        }

        if (form.nama_penerima.value == ""){
          alert("Nama Penerima harus diisi!");
          form.nama_penerima.focus();
          return (false);
        }

        if (form.tgl_penghapusan.value == ""){
          alert("Tanggal Penghapusan harus diisi!");
          form.tgl_penghapusan.focus();
          return (false);
        }

        return (true);
        }
        
  </script>

   <script>
    function hanyaAngka(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode<48 || charCode >57))
        return false;
      return true;
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
            <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="newaset.php"><em class="fa fa-edit">&nbsp;</em> New Asset Data</a></li>
             <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em> Component <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="fixedasset.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Data
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


	<!-- header kendaraan -->	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Asset Deletion </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
		</div>
		<!-- end header kendaraan -->		
					
		<!-- form kendaraan -->
		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-default">
				<div class="panel-heading">
						Form Asset Deletion 
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
        <?php 
        $kode_aset=$_GET['kode_aset'];
        ?>
		  <form class="form-horizontal" action='proses/prosestambahpenghapusan.php'  autocomplete="off" method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <fieldset>
         
        	<div class="form-group">
            <label class="col-md-3 control-label" for="kode_aset">Kode Aset*</label>
            <div class="col-md-9">
            <input type="text" id="kode_aset" name="kode_aset" value="<?=$kode_aset ?>" class="form-control" readonly>
            </div>
			</div>

			<div class="form-group">
            <label class="col-md-3 control-label" for="metode_penghapusan">Metode Penghapusan*</label>
            <div class="col-md-9">
            <select name="metode_penghapusan" class="form-control">
            <option value="pilih" selected>-- Pilih Metode Penghapusan --</option>
            <option value="Lelang">Lelang</option>
            <option value="Renovasi">Renovasi</option> 
            <option value="Dijual">Dijual</option>  
            <option value="Dijual">Rusak</option>
            <option value="Dijual">Hibah</option>        
                    </select>
            
            </div></div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="status">Status*</label>
            <div class="col-md-9">
            <select name="status" class="form-control">
            <option value="pilih" selected>-- Pilih Status --</option>
            <option value="Lelang">Lelang</option>
            <option value="Renovasi">Renovasi</option> 
            <option value="Dijual">Dijual</option> 
             <option value="Dijual">Rusak</option>
            <option value="Dijual">Hibah</option>       
                    </select>
            
            </div></div>

      <div class="form-group">
      <label class="col-md-3 control-label" for="nilai_residu">Nilai Residu*</label>
            <div class="col-md-9">
            <input type="text" id="nilai_residu" name="nilai_residu" placeholder="Nilai Residu"  class="form-control" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="10">
            </div>
            </div>

            <div class="form-group">
      <label class="col-md-3 control-label" for="nama_penerima">Nama Penerima*</label>
            <div class="col-md-9">
            <input type="text" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima"  class="form-control" minlength="1" maxlength="30">
            </div>
            </div>

            <div class="form-group">
      <label class="col-md-3 control-label" for="tgl_penghapusan">Tanggal Penghapusan*</label>
            <div class="col-md-9">
            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                  <input class="form-control" type="text" id="tgl_penghapusan" name="tgl_penghapusan" readonly="readonly">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div> </div>
          <br>
            			 <div class="controls">
              <button class="btn btn-success  btn-md pull-right" name="simpan">Tambahkan</button>
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