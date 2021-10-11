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
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
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
                    <li><a class="" href="gedung.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Building Data
                    </a></li>
                </ul>
            </li>
            <li class="active"><a href="posisibarang.php"><em class="fa  fa-location-arrow">&nbsp;</em> Position of Lend</a></li>
            <li class=""><a href="jadwal.php"><em class="fa  fa-calendar">&nbsp;</em> Lend Schadule</a></li>
            <li class=""><a href="lappengembalian.php"><em class="fa   fa-rotate-right ">&nbsp;</em> Returns Report</a></li>
            <li class=""><a href="buy.php"><em class="fa   fa-history ">&nbsp;</em> History of Purchase</a></li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
    <!--Tutup Sidebar-->

        
    <!--MainBar-->
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Position of Lend</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div>
                
                    
        

        
         <div class="row">

        <div class="col-md-12">

       <div class="panel panel-default chat">          
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Electronic</a></li>
              <li><a href="#tab_2" data-toggle="tab">Vehicle</a></li>
              <li><a href="#tab_3" data-toggle="tab">Building</a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <table id="example1" class="table-data table table-striped table-hover">
                <thead>
                <tr class ="success">
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Merk Barang</th>
                <th>Lokasi Kegiatan</th>
                <th>Jumlah Pinjaman</th>
                </tr>
                </thead>
            <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT tbuser.nama_user, daftarinventaris.kode_aset, tbaset.nama_aset, daftarinventaris.jns, daftarinventaris.merk, tbpeminjaman.lokasi_kegiatan, tbpeminjaman.jumlah_pesanan
                FROM tbpeminjaman
                INNER JOIN tbuser ON tbuser.NIK = tbpeminjaman.NIK
                INNER JOIN daftarinventaris ON daftarinventaris.kode_aset = tbpeminjaman.kode_aset
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                WHERE statuspeminjaman = 'approve'
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>

                    <td>".$data['nama_user']."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['jns']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['lokasi_kegiatan']."</td>
                    <td>".$data['jumlah_pesanan']."</td>
                   
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>

    </tbody>
    </table> 
    </div>


              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                     <table id="example5" class="table-data table table-striped table-hover">
                <thead>
                <tr class="success">
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Kode Kendaraan</th>
                <th>Nama Kendaraan</th>
                <th>Jenis Kendaraan</th>
                <th>Merk Kendaraan</th>
                <th>No. Kendaraan</th>
                <th>Lokasi Kegiatan</th>
                <th>Jumlah Pinjaman</th>
                </tr>
                </thead>
            <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT tbuser.nama_user, tbkendaraan.kode_aset, tbaset.nama_aset, tbkendaraan.jns, tbkendaraan.merk, tbkendaraan.no_kendaraan, tbpeminjaman.lokasi_kegiatan, tbpeminjaman.jumlah_pesanan
                FROM tbpeminjaman
                INNER JOIN tbuser ON tbuser.NIK = tbpeminjaman.NIK
                INNER JOIN tbkendaraan ON tbkendaraan.kode_aset = tbpeminjaman.kode_aset
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                WHERE statuspeminjaman ='approve'
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>

                    <td>".$data['nama_user']."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['jns']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['no_kendaraan']."</td>
                    <td>".$data['lokasi_kegiatan']."</td>
                    <td>".$data['jumlah_pesanan']."</td>
                   
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>

    </tbody>
    </table> 
    </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                     <table id="example2" class="table-data table table-striped table-hover">
                <thead>
                <tr class ="success">
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Kode Gedung</th>
                <th>Kelompok Gedung</th>
                <th>Nama Gedung</th>
                <th>Luas Gedung</th>
                <th>Lokasi</th>
                </tr>
                </thead>
            <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT tbuser.nama_user, tbgedung.kode_aset, tbaset.nama_aset, tbaset.kelompok_aset, tbgedung.luas_gedung, tbpeminjaman.lokasi_kegiatan
                FROM tbpeminjaman
                INNER JOIN tbuser ON tbuser.NIK = tbpeminjaman.NIK
                INNER JOIN tbgedung ON tbgedung.kode_aset = tbpeminjaman.kode_aset
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                WHERE statuspeminjaman='approve'
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>

                    <td>".$data['nama_user']."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['luas_gedung']."</td>
                    <td>".$data['lokasi_kegiatan']."</td>

                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>

    </tbody>
    </table> 
    </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
</div></div>
         
            
 <!--Tutup MainBar-->
            


<!--Footer-->
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
<!--Tutup Footer-->
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

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    $('#example5').DataTable()
    $('#example4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    $('#example2').DataTable()
    $('#example6').DataTable({
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

            
