<?php
include('connection.php');
session_start();
$nik = $_SESSION['nik'];
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
                    <ul class="nav navbar-top-links navbar-right ">
                    <li class="dropdown "><a href="halpeminjam.php">
                        <em class="fa fa-home "></em>
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
            <li class="active"><a href="pengadaan.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class=""><a href="request.php"><em class="fa  fa-edit">&nbsp;</em> Request New Items </a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
            <em class="fa fa-history">&nbsp;</em> History <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
            <ul class="children collapse" id="sub-item-2">
            <li><a class="" href="wait.php">
            <span class="fa fa-arrow-right">&nbsp;</span> Waiting For Approval
            </a></li>
            <li><a class="" href="unapproved.php">
            <span class="fa fa-arrow-right">&nbsp;</span> Unapproved Procurement Data
            </a></li>
            
            </ul>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
   <!--Tutup Sidebar-->

        
    <!--MainBar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="pengadaan.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Procurement of Items</li>
            </ol>
        </div><!--/.row-->


    <div class="row">
      <div class="col-lg-12">
        <h2>Dashboard</h2>
      </div>
      <div class="col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading">Procurement of Items</div>
          <div class="panel-body">
            <p align="justify">Sehubung dengan pentingnya aset dalam perusahaan METIS TEKNOLOGI CORPORINDO yang merupakan alat penunjang kegiatan suatu organisasi. Kami selaku METIS TEKNOLOGI CORPORINDO ingin memudahkan karyawan dalam mengajukan <a href="http://rizhuljanuar.com/aset_peminjaman/request.php">Aset baru.</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-danger">
          <div class="panel-heading">Unapproved Procurement Data</div>
          <div class="panel-body">
            <p>Data Pengajuan Aset yang Tidak disetujui Oleh Para Manajer Bisa Anda Lihat <a href="http://rizhuljanuar.com/aset_peminjaman/unapproved.php">disini.</a></p> </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="">
          <div class="panel-heading"></div>
          <div class="panel-body">
           
          </div>
        </div>
      </div>
    </div><!-- /.row -->
      <!--/.col-->
 <!--Tutup MainBar-->
            


<!--Footer-->
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
            
