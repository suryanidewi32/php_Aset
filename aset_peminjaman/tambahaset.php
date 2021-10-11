<?php
include('cekpetugas.php');
include('connection.php');
 $koder=$_GET['koder'];

    $result=mysqli_query($connection, "select * from tbpengadaan WHERE koder='$koder'");

    $data = mysqli_fetch_array($result);
?>
<?php


$con = mysqli_connect("localhost","root","","dbasetpeminjaman");
$result = mysqli_query($con, "SELECT kode_aset FROM tbaset ORDER BY kode_aset DESC");
$kd = mysqli_fetch_array($result);
$kdaset = $kd['kode_aset'];

$urut = substr($kdaset, 5, 5);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1){
  $format = "CV/A."."0000".$tambah;
}else if (strlen($tambah) == 2){
  $format = "CV/A."."000".$tambah;
}else if (strlen($tambah) == 3){
  $format = "CV/A."."00".$tambah;
}else if (strlen($tambah) == 4){
  $format = "CV/A."."0".$tambah;  
}else {
$format = "CV/A.".$tambah;  
}
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

         if (form.tgl_input.value == ""){
          alert("Tanggal Input harus diisi!");
          form.tgl_input.focus();
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

      if (form.kondisi_aset.value == "pilih"){
          alert("Kondisi Aset harus diisi!");
          form.kondisi_aset.focus();
          return (false);
        }

      if (form.harga_beli.value == ""){
          alert("Harga Beli harus diisi!");
          form.harga_beli.focus();
          return (false);
        }

      if (form.nama_aktiva.value == "pilih"){
          alert("Nama Aktiva harus diisi!");
          form.nama_aktiva.focus();
          return (false);
        }

      if (form.masa_perkiraan.value == "pilih"){
          alert("Masa Perkiraan harus diisi!");
          form.masa_perkiraan.focus();
          return (false);
        }

         if (form.stock.value == ""){
          alert("Stock harus diisi!");
          form.stock.focus();
          return (false);
        }

        if (form.stock1.value == ""){
          alert("Stock Barang harus diisi!");
          form.stock1.focus();
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
            <li class="parent"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="active"><a href="newaset.php"><em class="fa fa-edit">&nbsp;</em> New Asset Data</a></li>
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
        <li class="active">Form New Asset</li>
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
            Form New Asset
            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
          <div class="panel-body">
            
      <form class="form-horizontal" action='proses/prosestambahaset.php' autocomplete="off" method='POST' enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <fieldset>
         
          <div class="form-group">
            <label class="col-md-3 control-label" for="kode_aset">Kode Aset*</label>
            <div class="col-md-9">
            <input type="text" id="kode_aset" name="kode_aset"
            value="<?php echo $format;?>" placeholder="Kode Aset" class="form-control" readonly>
            </div>
      </div>

    
            <div class="form-group">
            <label class="col-md-3 control-label" for="nama_aset">Nama Aset*</label>
            <div class="col-md-9">
            <input type="text" id="nama_aset" name="nama_aset" value="<?php echo $data['nama_aset']?>" placeholder="Nama Aset" class="form-control" minlength="1" maxlength="50" readonly>
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
            <option value="Gedung" <?php if($data['kelompok_aset']=='Gedung'){echo "selected";}?>> Gedung</option > 
            </select>
            
            </div></div>

              <div class="form-group">
      <label class="col-md-3 control-label" for="tgl_input">Tanggal Input*</label>
            <div class="col-md-9">
               <div class="input-group " >
                 <input class="form-control" type="date" id="tgl_input" name="tgl_input" value="<?php
$tgl=date('Y-m-d');
echo $tgl;
?>" readonly="readonly"> 
            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
             </div>      
            </div>
          </div>

            <div class="form-group">
      <label class="col-md-3 control-label" for="tgl_beli">Tanggal Beli*</label>
            <div class="col-md-9">
            <div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
                  <input class="form-control" type="text" id="tgl_beli" name="tgl_beli" readonly="readonly">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>
          </div> </div>

            <div class="form-group">
      <label class="col-md-3 control-label" for="penyedia_jasa">Penyedia Jasa*</label>
            <div class="col-md-9">
            <input type="text" id="penyedia_jasa" name="penyedia_jasa" placeholder="Penyedia Jasa"  class="form-control" minlength="1" maxlength="30">
            </div>
            </div>

            <div class="form-group">
      <label class="col-md-3 control-label" for="lokasi_pembelian">Lokasi Pembelian*</label>
            <div class="col-md-9">
            <input type="text" id="lokasi_pembelian" name="lokasi_pembelian" placeholder="Lokasi Pembelian" class="form-control" minlength="1" maxlength="50">
            </div>
          </div>
           

            <div class="form-group">
      <label class="col-md-3 control-label" for="kondisi_aset">Kondisi Aset*</label>
            <div class="col-md-9">
            <select name="kondisi_aset" class="form-control">
            <option value="pilih" selected>-- Pilih Kondisi Aset --</option>
            <option value="Baru">Baru</option>
            <option value="Bekas">Bekas</option>  
             </select>
            </div>
            </div>

      <div class="form-group">
      <label class="col-md-3 control-label" for="harga_beli">Harga Beli*</label>
            <div class="col-md-9">
            <input type="text" id="harga_beli" name="harga_beli" value="<?php echo $data['harga']?>" placeholder="Harga Beli"  class="form-control" onkeypress="return hanyaAngka(event)"  minlength="1" maxlength="10" readonly>
            </div>
            </div>

               <div class="form-group">
            <label class="col-md-3 control-label" for="nama_aktiva">Kelompok Harta*</label>
            <div class="col-md-9">
            <select name="nama_aktiva" class="form-control">
            <option value="pilih" selected>-- Pilih Kelompok Harta --</option>
            <option value="1">Kelompok 1</option>
            <option value="2">Kelompok 2</option>  
            <option value="3">Kelompok 3</option>
            <option value="4">Kelompok 4</option> 
            </select>
            
            </div></div>

            <div class="form-group">
            <label class="col-md-3 control-label" for="masa_perkiraan">Masa Manfaat*</label>
            <div class="col-md-9">
            <select name="masa_perkiraan" class="form-control">
            <option value="pilih" selected>-- Pilih Masa Manfaat --</option>
            <option value="4 tahun">4 tahun</option>
            <option value="8 tahun">8 tahun</option>  
            <option value="16 tahun">16 tahun</option>
            <option value="20 tahun">20 tahun</option> 
            </select>
            
            </div></div>

            <div class="form-group">
      <label class="col-md-3 control-label" for="stock">Stock*</label>
            <div class="col-md-9">
            <input type="text" id="stock" name="stock" value="<?php echo $data['stock1']?>" placeholder="Stock"  class="form-control" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="5" readonly>
            </div>
            </div>

            <div class="form-group">
      <label class="col-md-3 control-label" for="stock1">Stock Barang*</label>
            <div class="col-md-9">
            <input type="text" id="stock1" name="stock1" value="<?php echo $data['stock1']?>" placeholder="Stock Barang"  class="form-control" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="5" readonly>
            </div>
            </div>

             <div class="form-group">
      <label class="col-md-3 control-label" for="statusbarang">Status*</label>
            <div class="col-md-9">
          <select name="statusbarang" class="form-control">
            <option value="pilih" selected>-- Pilih Tersedia --</option>
            <option value="Tersedia">Tersedia</option>
            </select>
              </div>
            </div>

            


      <div class="form-group">
      <label class="col-md-3 control-label" for="NIK">NIK*</label>
            <div class="col-md-9">
            <input type="text" id="NIK" name="NIK" value="<?php echo $_SESSION['nik']; ?>" placeholder="NIK"  class="form-control" readonly>
            </div>
            </div>
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
<div class="clear"></div>
        
 <div class="row">
      <div class="col-sm-12">
         

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