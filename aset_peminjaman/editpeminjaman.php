<?php
include('connection.php');
 session_start();
$nik = $_SESSION['nik'];

    $kode_aset=$_GET['kode_aset'];

    $result=mysqli_query($connection, "select * from tbpeminjaman WHERE kode_aset='$kode_aset'");

    $data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Halaman Loan of Items </title>
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
      if (form.NIK.value != ""){
        var x = (form.NIK.value);
      var mincar = 5;
        var status = true;
        var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        for (i=0; i<=x.length-1; i++)
        {
        if (x[i] in list) cek = true;
        else cek = false;
      } 
        }
       
       if (form.NIK.value == ""){
          alert("NIK harus diisi!");
          form.NIK.focus();
          return (false);

       }

       
        
      if (form.kode_aset.value == ""){
          alert("Kode Aset harus diisi!");
          form.kode_aset.focus();
          return (false);
        }

         if (form.kegiatan.value == ""){
          alert("Kegiatan harus diisi!");
          form.kegiatan.focus();
          return (false);
        }

        if (form.kegiatan.value.length < mincar){
          alert("Panjang Kegiatan Minimal 5 Karakter!");
          form.kegiatan.focus();
          return (false);
        }

         if (form.lokasi_kegiatan.value == ""){
          alert("Lokasi Kegiatan harus diisi!");
          form.lokasi_kegiatan.focus();
          return (false);
        }

        if (form.lokasi_kegiatan.value.length < mincar){
          alert("Panjang Lokasi Minimal 5 Karakter!");
          form.lokasi_kegiatan.focus();
          return (false);
        }

         if (form.jumlah_pesanan.value == ""){
          alert("Jumlah Pesanan harus diisi!");
          form.jumlah_pesanan.focus();
          return (false);
        }

      if (form.tgl_peminjaman.value == ""){
          alert("Tanggal Peminjaman harus diisi!");
          form.tgl_peminjaman.focus();
          return (false);
        }

    if (form.tgl_pengembalian.value == "Pilih"){
          alert("Tanggal Pengembalian harus diisi!");
          form.tgl_pengembalian.focus();
          return (false);
        }
 if (form.statuspeminjaman.value == ""){
          alert("Status harus diisi!");
          form.statuspeminjaman.focus();
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
      ?????? $('[data-toggle="tooltip"]').tooltip(); 
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
                    <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a href="halpeminjam.php">
                        <em class="fa fa-home"></em><span class="label label-danger"></span>
                    </a>
                      
                                    <br /></div>
                                </div>
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
                <img src="img/user.jpg" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name"><?php echo $_SESSION['username']; ?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
       
        <ul class="nav menu">
            <li class=""><a href="pinjam.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
             <li class=""><a href="daftarinventaris.php"><em class="fa  fa-th-list">&nbsp;</em> List of Items</a></li>
           
           <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-history">&nbsp;</em> History <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                     <li><a class="active" href="menunggu.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Waiting For Approval
                    </a></li>
                    <li><a class="" href="approve.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Approved Loan Data
                    </a></li>
                    <li><a class="" href="cancel.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Unapproved Loan Data
                    </a></li>
                </ul>
            </li>
            <li class=""><a href="pengembalian.php"><em class="fa  fa-rotate-right">&nbsp;</em>Return of Items</a></li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
    <!--Tutup Sidebar-->
    
		

	<!-- header Barang -->	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="pinjam.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Edit Loan of Items </li>
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
						Form Edit Loan of Items 
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
                        <?php 
                        $kode_aset=$_GET['kode_aset'];
        ?>
		  <form class="form-horizontal" action='proses/proseseditpeminjaman.php' method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <fieldset>


         	<div class="form-group">
            <label class="col-md-3 control-label" for="kode_aset">Kode Barang*</label>
            <div class="col-md-9">
            <input type="text" id="kode_aset" name="kode_aset" value="<?php echo $data['kode_aset']?>" class="form-control" readonly>
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="kegiatan">Kegiatan*</label>
            <div class="col-md-9">
            <input type="text" id="kegiatan" name="kegiatan" value="<?php echo $data['kegiatan']?>" placeholder="kegiatan" class="form-control" minlength="5" maxlength="30">
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="lokasi_kegiatan">Lokasi Kegiatan*</label>
            <div class="col-md-9">
            <input type="text" id="lokasi_kegiatan" name="lokasi_kegiatan" value="<?php echo $data['lokasi_kegiatan']?>" placeholder="Lokasi kegiatan" class="form-control" minlength="5" maxlength="30">
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="jumlah_pesanan">Jumlah Pesanan*</label>
            <div class="col-md-9">
            <input type="number" min="1" id="jumlah_pesanan" name="jumlah_pesanan" value="<?php echo $data['jumlah_pesanan']?>" placeholder="Jumlah Pesanan" class="form-control" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="5">
            </div>
            </div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="tgl_peminjaman">Tanggal Peminjaman</label>
            <div class="col-md-9">
                    <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                    <input class="form-control" type="text" id="tgl_peminjaman" value="<?php echo $data['tgl_peminjaman']?>" name="tgl_peminjaman" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div> </div>

          	<div class="form-group">
            <label class="col-md-3 control-label" for="tgl_pengembalian">Tanggal Pengembalian</label>
            <div class="col-md-9">
                    <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                    <input class="form-control" type="text" id="tgl_pengembalian" value="<?php echo $data['tgl_pengembalian']?>" name="tgl_pengembalian" \>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
            </div> </div>
           


          <br>
            			 <div class="controls">
              <button class="btn btn-primary  btn-md pull-right" name="simpan">Edit</button>
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
	<!--/.main-->


	
   
    
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