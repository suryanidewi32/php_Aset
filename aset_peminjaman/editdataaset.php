<?php
include('cekpetugas.php');
include('connection.php');


    $kode_aset=$_GET['kode_aset'];

    $result=mysqli_query($connection, "select * from tbaset WHERE kode_aset='$kode_aset'");

    $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Penyusutan Aset</title>
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

         if (form.tgl_input.value == ""){
          alert("Tanggal Input harus diisi!");
          form.tgl_input.focus();
          return (false);
        }
      
      if (form.nama_aset.value == ""){
          alert("Nama Aset harus diisi!");
          form.nama_aset.focus();
          return (false);
        }
        
      if (form.kelompok_aset.value == "pilih"){
          alert("Kelompok Aset harus diisi!");
          form.kelompok_aset.focus();
          return (false);
        }

	  if (form.tgl_beli.value == ""){
          alert("Tanggal Beli harus diisi!");
          form.tgl_beli.focus();
          return (false);
        }


      if (form.penyedia_jasa.value == ""){
          alert("Penyedia Jasa harus diisi!");
          form.penyedia_jasa.focus();
          return (false);
        }

      if (form.lokasi_pembelian.value == ""){
          alert("Lokasi Pembelian harus diisi!");
          form.lokasi_pembelian.focus();
          return (false);
        }

      if (form.kondisi_aset.value == ""){
          alert("Kondisi Aset harus diisi!");
          form.kondisi_aset.focus();
          return (false);
        }

    

      if (form.nama_aktiva.value == ""){
          alert("Nama Aktiva harus diisi!");
          form.nama_aktiva.focus();
          return (false);
        }

      if (form.masa_perkiraan.value == ""){
          alert("Nasa Perkiraan harus diisi!");
          form.masa_perkiraan.focus();
          return (false);
        }

      if (form.status.value == "pilih"){
          alert("Status harus diisi!");
          form.status.focus();
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
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="active" href="fixedasset.php">
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
				<li class="active">Form Edit Asset</li>
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
						Form Edit Asset
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
            
		  <form class="form-horizontal" action='proses/proseseditaset.php'  autocomplete="off" method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <fieldset>
         
        	<div class="form-group">
            <label class="col-md-3 control-label" for="kode_aset">Kode Aset</label>
            <div class="col-md-9">
            <input type="text" id="kode_aset" value="<?php echo $data['kode_aset']?>" name="kode_aset" placeholder="Kode Aset" class="form-control" readonly>
            </div>
			</div>

			
               
          	<div class="form-group">
          	<label class="col-md-3 control-label" for="nama_aset">Nama Aset</label>
            <div class="col-md-9">
            <input type="text" id="nama_aset" value="<?php echo $data['nama_aset']?>" name="nama_aset" placeholder="Nama Aset" class="form-control" minlength="1" maxlength="50" readonly>
           	</div>
			</div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="kelompok_aset">Kelompok Aset</label>
            <div class="col-md-9">
            <select id="kelompok_aset" name="kelompok_aset" class="form-control">
            <option value="pilih" selected>-- Pilih Kelompok Aset --</option>
            <option value="Barang" <?php if($data['kelompok_aset']=='Barang'){echo "selected";}?>> Barang</option>
            <option value="Elektronik" <?php if($data['kelompok_aset']=='Elektronik'){echo "selected";}?>> Elektronik</option>  
            <option value="Mesin" <?php if($data['kelompok_aset']=='Mesin'){echo "selected";}?>> Mesin</option>
             <option value="It Equipment" <?php if($data['kelompok_aset']=='It Equipment'){echo "selected";}?>> It Equipment</option>
            <option value="Kendaraan" <?php if($data['kelompok_aset']=='Kendaraan'){echo "selected";}?>> Kendaraan</option> 
            <option value="Gedung" <?php if($data['kelompok_aset']=='Gedung'){echo "selected";}?>> Gedung</option>  
            </select>
            
            </div></div>

<div class="form-group">
      <label class="col-md-3 control-label" for="tgl_input">Tanggal Input</label>
            <div class="col-md-9">
            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                  <input class="form-control" value="<?php echo $data['tgl_input']?>" type="text" id="tgl_input" name="tgl_input" readonly="readonly">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div> </div>

          	<div class="form-group">
			<label class="col-md-3 control-label" for="tgl_beli">Tanggal Beli</label>
            <div class="col-md-9">
				    <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
	                <input class="form-control" type="text" id="tgl_beli" value="<?php echo $data['tgl_beli']?>" name="tgl_beli" readonly="readonly">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
         	</div> </div>

          	<div class="form-group">
			<label class="col-md-3 control-label" for="penyedia_jasa">Penyedia Jasa</label>
            <div class="col-md-9">
            <input type="text" id="penyedia_jasa" value="<?php echo $data['penyedia_jasa']?>" name="penyedia_jasa" placeholder="Penyedia Jasa"  class="form-control" minlength="1" maxlength="30">
            </div>
          	</div>

          	<div class="form-group">
			<label class="col-md-3 control-label" for="lokasi_pembelian">Lokasi Pembelian</label>
            <div class="col-md-9">
            <input type="text" id="lokasi_pembelian" value="<?php echo $data['lokasi_pembelian']?>" name="lokasi_pembelian" placeholder="Lokasi Pembelian" class="form-control" minlength="1" maxlength="50">
            </div>
         	</div>
           

          	<div class="form-group">
			<label class="col-md-3 control-label" for="kondisi_aset">Kondisi Aset</label>
            <div class="col-md-9">
            <select id="kondisi_aset" name="kondisi_aset" class="form-control">
            <option value="pilih" selected>-- Pilih Kondisi Aset --</option>
            <option value="Baru" <?php if($data['kondisi_aset']=='Baru'){echo "selected";}?>> Baru</option>
            <option value="Bekas" <?php if($data['kondisi_aset']=='Bekas'){echo "selected";}?>> Bekas</option>  
            
            </select>  </div>
          	</div>

			

              <div class="form-group">
            <label class="col-md-3 control-label" for="nama_aktiva">Kelompok Harta</label>
            <div class="col-md-9">
            <select id="nama_aktiva" name="nama_aktiva" class="form-control">
            <option value="pilih" selected>-- Pilih Kelompok Harta --</option>
            <option value="1" <?php if($data['nama_aktiva']=='1'){echo "selected";}?>> Kelompok 1</option>
            <option value="2" <?php if($data['nama_aktiva']=='2'){echo "selected";}?>> Kelompok 2</option>  
            <option value="3" <?php if($data['nama_aktiva']=='3'){echo "selected";}?>> Kelompok 3</option>
            <option value="4" <?php if($data['nama_aktiva']=='4'){echo "selected";}?>> Kelompok 4</option> 
            </select>
            </div></div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="masa_perkiraan">Masa Manfaat</label>
            <div class="col-md-9">
            <select id="masa_perkiraan" name="masa_perkiraan" class="form-control">
            <option value="pilih" selected>-- Pilih Masa Manfaat --</option>
            <option value="4 tahun" <?php if($data['masa_perkiraan']=='4 tahun'){echo "selected";}?>> 4 tahun</option>
            <option value="8 tahun" <?php if($data['masa_perkiraan']=='8 tahun'){echo "selected";}?>> 8 tahun</option>  
            <option value="16 tahun" <?php if($data['masa_perkiraan']=='16 tahun'){echo "selected";}?>> 16 tahun</option>
            <option value="20 tahun" <?php if($data['masa_perkiraan']=='20 tahun'){echo "selected";}?>> 20 tahun</option> 
            </select>
            </div></div>

            

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


			 <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>	<!--/.main-->


	
   
    
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