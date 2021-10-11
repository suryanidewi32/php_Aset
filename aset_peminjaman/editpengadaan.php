<?php
include('connection.php');
 session_start();
$nik = $_SESSION['nik'];

    $koder=$_GET['koder'];

    $result=mysqli_query($connection, "select * from tbpengadaan WHERE koder='$koder'");

    $data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Halaman Procurement of Items</title>
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
      if (form.nama_aset.value != ""){
        var x = (form.nama_aset.value);
      var mincar = 11;
        var status = true;
        var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        for (i=0; i<=x.length-1; i++)
        {
        if (x[i] in list) cek = true;
        else cek = false;
      }

         }

        

         if (form.nama_aset.value == ""){
          alert("Nama Barang harus diisi!");
          form.nama_aset.focus();
          return (false);
        }
      
      if (form.kelompok_aset.value == "pilih"){
          alert("Kelompok Barang harus diisi!");
          form.kelompok_aset.focus();
          return (false);
        }
        
      if (form.posisi.value == ""){
          alert("Posisi Barang harus diisi!");
          form.posiso.focus();
          return (false);
        }

    if (form.tujuan.value == ""){
          alert("Tujuan Pembelian harus diisi!");
          form.tujuan.focus();
          return (false);
        }


      if (form.stock1.value == ""){
          alert("Jumlah Barang harus diisi!");
          form.stock1.focus();
          return (false);
        }

      if (form.harga.value == ""){
          alert("Perkiraan Harga harus diisi!");
          form.harga.focus();
          return (false);
        }

      if (form.tgl_pengajuan.value == ""){
          alert("Tanggal Pengajuan harus diisi!");
          form.tgl_pengajuan.focus();
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
            <li class=""><a href="pengadaan.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class=""><a href="request.php"><em class="fa  fa-edit">&nbsp;</em> Request New Items </a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
            <em class="fa fa-history">&nbsp;</em> History <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
            <ul class="children collapse" id="sub-item-2">
            <li><a class="active" href="wait.php">
            <span class="fa fa-arrow-right">&nbsp;</span> Waiting for approval
            </a></li>
            <li><a class="" href="unapproved.php">
            <span class="fa fa-arrow-right">&nbsp;</span> Unapproved Procurement Data
            </a></li>
            
           
            </ul>
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
				<li class="active">Edit Request New Items</li>
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
						Form Edit Request New Items
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
                        <?php 
                        $koder=$_GET['koder'];
        ?>
		  <form class="form-horizontal" action='proses/proseseditpengajuan.php' method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <fieldset>


         	<div class="form-group">
            <label class="col-md-3 control-label" for="koder">Kode Pengajuan*</label>
            <div class="col-md-9">
            <input type="text" id="koder" name="koder" value="<?php echo $data['koder']?>" class="form-control" readonly>
            </div>
            </div>

           <div class="form-group">
            <label class="col-md-3 control-label" for="nama_aset">Nama Barang*</label>
            <div class="col-md-9">
            <input type="text" id="nama_aset" name="nama_aset" value="<?php echo $data['nama_aset']?>" placeholder="Nama Aset" class="form-control" minlength="1" maxlength="50">
            </div>
      </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="kelompok_aset">Kelompok Inventaris*</label>
            <div class="col-md-9">
            <select id="jns" name="kelompok_aset" class="form-control">
            <option value="pilih" selected>-- Pilih Kelompok Inventaris --</option>
            <option value="Barang" <?php if($data['kelompok_aset']=='Barang'){echo "selected";}?>> Barang</option>
            <option value="Elektronik" <?php if($data['kelompok_aset']=='Elektronik'){echo "selected";}?>> Elektronik</option>  
            <option value="Mesin" <?php if($data['kelompok_aset']=='Mesin'){echo "selected";}?>> Mesin</option>
             <option value="It Equipment" <?php if($data['kelompok_aset']=='It Equipment'){echo "selected";}?>> It Equipment</option>
            <option value="Kendaraan" <?php if($data['kelompok_aset']=='Kendaraan'){echo "selected";}?>> Kendaraan</option> 
            <option value="Gedung" <?php if($data['kelompok_aset']=='Gedung'){echo "selected";}?>> Gedung</option>  
            </select>
            
            </div></div>

             <div class="form-group">
            <label class="col-md-3 control-label" for="merk">Merk*</label>
            <div class="col-md-9">
            <input type="text" id="merk" name="merk"  value="<?php echo $data['merk']?>" placeholder="Merk" class="form-control" minlength="1" maxlength="20">
            </div>
            </div>

              <div class="form-group">
            <label class="col-md-3 control-label" for="posisi">Posisi Barang*</label>
            <div class="col-md-9">
            <input type="text" id="posisi" name="posisi" value="<?php echo $data['posisi']?>" placeholder="Posisi Barang" class="form-control"  minlength="1" maxlength="20">
            </div>
            </div>

              <div class="form-group">
            <label class="col-md-3 control-label" for="tujuan">Tujuan Pembelian*</label>
            <div class="col-md-9">
            <input type="text" id="tujuan" name="tujuan" value="<?php echo $data['tujuan']?>" placeholder="Tujuan Pembelian" class="form-control" minlength="1" maxlength="30">
            </div>
            </div>

              <div class="form-group">
            <label class="col-md-3 control-label" for="stock1">Jumlah Barang*</label>
            <div class="col-md-9">
            <input type="number" min="0" id="stock1" name="stock1" value="<?php echo $data['stock1']?>" placeholder="Jumlah Barang" class="form-control" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="5">
            </div>
            </div>

              <div class="form-group">
            <label class="col-md-3 control-label" for="harga">Perkiraan Harga</label>
            <div class="col-md-9">
            <input type="text" id="harga" name="harga" value="<?php echo $data['harga']?>" placeholder="Perkiraan Harga" class="form-control" onkeypress="return hanyaAngka(event)"  minlength="1" maxlength="10">
            </div>
            </div>

          <br>
            			 <div class="controls">
              <button class="btn btn-primary  btn-md pull-right" name="simpan">Edit Request Items</button>
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