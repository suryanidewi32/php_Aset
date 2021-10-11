<?php
include('cekmanajerbagumum.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Halaman Manajer Bagian Umum</title>
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
            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-file-o">&nbsp;</em> Reports <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="" href="lappeminjaman.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Loan Report
                    </a></li>
                    <li><a class="" href="dir.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> List Inventory Report
                    </a></li>
                    <li><a class="active" href="penanggungdir.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Report PIC
                    </a></li>
                    <li><a class="" href="pengadaanbarang.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Procurement Report
                    </a></li>
                    <li><a class="" href="unapprovedpengadaanbarang.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Unapproved Procurement Report
                    </a></li>
                </ul>
            </li>

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
                <li class="active">Report PIC</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div>
                
                    
        

        
         <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> List Inventory</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 Gedung
              <table id="example" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Gedung</th>
                <th>Kelompok</th>
                <th>Nama Gedung</th>
                <th>Luas Gedung</th>
                <th>Posisi</th>
                <th>Nama Penginput</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbgedung.kode_aset, tbaset.nama_aset, tbaset.kelompok_aset, tbgedung.luas_gedung,tbgedung.posisi,tbuser.nama_user
                FROM tbgedung
                INNER JOIN tbaset ON tbaset.kode_aset = tbgedung.kode_aset 
                INNER JOIN tbuser ON tbuser.NIK = tbgedung.NIK
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['luas_gedung']."</td>
                    <td>".$data['posisi']."</td>
                    <td>".$data['nama_user']."</td>
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
        <br><br>
            Barang
              <table id="example" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Stock</th>
                <th>Posisi</th>
                <th>Nama Penginput</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT daftarinventaris.kode_aset, tbaset.kelompok_aset, daftarinventaris.jns, tbaset.nama_aset, daftarinventaris.merk, tbaset.stock1, daftarinventaris.posisi, tbuser.nama_user
                FROM daftarinventaris
                INNER JOIN tbaset ON tbaset.kode_aset = daftarinventaris.kode_aset
                INNER JOIN tbuser ON tbuser.NIK = daftarinventaris.NIK");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['jns']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['stock1']."</td>
                    <td>".$data['posisi']."</td>
                    <td>".$data['nama_user']."</td>
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
        
                        
                    <br>
                    <br>


                 
                Kendaraan
              <table id="example" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Barang</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>No. Kendaraan</th>
                <th>Tahun Pembuatan</th>
                <th>No. Rangka</th>
                <th>No. Mesin</th>
                
                <th>Posisi</th>
                <th>Nama Penginput</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbkendaraan.kode_aset, tbaset.kelompok_aset, tbkendaraan.jns, tbaset.nama_aset, tbkendaraan.merk, tbkendaraan.no_kendaraan, tbkendaraan.thn_pembuatan, tbkendaraan.no_rangka, tbkendaraan.no_mesin, tbkendaraan.posisi, tbuser.nama_user
                FROM tbkendaraan
                INNER JOIN tbaset ON tbaset.kode_aset = tbkendaraan.kode_aset 
                INNER JOIN tbuser ON tbuser.NIK = tbkendaraan.NIK 
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['jns']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['no_kendaraan']."</td>
                    <td>".$data['thn_pembuatan']."</td>
                    <td>".$data['no_rangka']."</td>
                    <td>".$data['no_mesin']."</td>
                   
                    <td>".$data['posisi']."</td>
                     <td>".$data['nama_user']."</td>
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
        
                  <br>
                  <br>
        

        
            <!-- /.box-header -->
               
             
                    </div>
                </div>


                  <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>
<!--/.main-->
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