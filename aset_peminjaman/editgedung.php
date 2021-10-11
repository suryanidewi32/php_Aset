<?php
include('cekperlengkapan.php');
include('connection.php');

    $kode_aset=$_GET['kode_aset'];

    $result=mysqli_query($connection, "select * from tbgedung WHERE kode_aset='$kode_aset'");

    $data = mysqli_fetch_array($result);
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

       if (form.luas_gedung.value == ""){
          alert("Luas harus diisi!");
          form.luas_gedung.focus();
          return (false);
        }
        
      if (form.posisi.value == ""){
          alert("Posisi harus diisi!");
          form.posisi.focus();
          return (false);
        }


      if (form.stock.value == ""){
          alert("Stock harus diisi!");
          form.stock.focus();
          return (false);
        }

        if (form.NIK.value == ""){
          alert("NIK diisi!");
          form.NIK.focus();
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
            <li class=""><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class=" parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-edit">&nbsp;</em> New Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="" href="newbarang.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> New Items
                    </a></li>
                    <li><a class="" href="newkendaraan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> New Vehicle
                    </a></li>
                    <li><a class="" href="newgedung.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> New Building
                    </a></li>
                </ul>
            </li>
             <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em> Inventory <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="barang.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Items
                    </a></li>
                    <li><a class="" href="kendaraan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Vehicle Data
                    </a></li>
                    <li><a class="active" href="gedung.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> DBuilding Data
                    </a></li>
                </ul>
            </li>
            <li class=""><a href="posisibarang.php"><em class="fa  fa-location-arrow">&nbsp;</em> Position of Lend</a></li>
            <li class=""><a href="jadwal.php"><em class="fa  fa-calendar">&nbsp;</em> Lend Schadule</a></li>
            <li class=""><a href="lappengembalian.php"><em class="fa   fa-rotate-right ">&nbsp;</em> Returns Report</a></li>
           <li class=""><a href="buy.php"><em class="fa   fa-history ">&nbsp;</em> History of Purchase</a></li>
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
				<li class="active">Form Edit Building</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
		</div>
		<!-- end header Barang -->		
					
		<!-- form  Barang -->
		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-default">
				<div class="panel-heading">
						Form Edit Building
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
		  <form class="form-horizontal" action='proses/proseseditgedung.php' method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <fieldset>
         
        	<div class="form-group">
            <label class="col-md-3 control-label" for="kode_aset">Kode Aset</label>
            <div class="col-md-9">
            <input type="text" id="kode_aset" name="kode_aset" value="<?php echo $data['kode_aset']?>" placeholder="Kode Aset" class="form-control" readonly>
            </div>
			</div>

         	<div class="form-group">
            <label class="col-md-3 control-label" for="luas_gedung">Luas</label>
            <div class="col-md-9">
            <input type="text" id="luas_gedung" value="<?php echo $data['luas_gedung']?>" name="luas_gedung" placeholder="Luas" class="form-control" minlength="1" maxlength="10">
            </div>
          	</div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="posisi">Posisi Gedung</label>
            <div class="col-md-9">
            <input type="text" id="posisi" value="<?php echo $data['posisi']?>" name="posisi" placeholder="Posisi Gedung" class="form-control" minlength="1" maxlength="20">
            </div>
            </div>

          	
           


          <br>
            			 <div class="controls">
              <button class="btn btn-success  btn-md pull-right" name="simpan">Edit</button>
            </div>
          </div>  
							</fieldset>
						</form>


					</div>
				</div>
			</div><!--/.col-->


		<div class="row">
            <div class="col-md-12">          
                <div class="panel panel-default">

        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>  <!--/.main-->

	
   
    
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