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
    <title>Halaman Loan of Items</title>
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
    <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
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
            <li class="active"><a href="pinjam.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class=""><a href="daftarinventaris.php"><em class="fa  fa-th-list">&nbsp;</em> List of Items</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
            <em class="fa fa-history">&nbsp;</em> History <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
            <ul class="children collapse" id="sub-item-2">
            <li><a class="" href="menunggu.php">
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

        
    <!--MainBar-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="pinjam.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Loan of Items </li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->


        <div class="row">
        <div class='col-lg-12'>

            <!-- untuk warning tanggal peminjaman melewati batas peminjaman-->
            <?php 
            $data_warn = mysqli_query($connection,
                "SELECT tgl_pengembalian,statuspeminjaman,kodep,kode_aset 
                FROM tbpeminjaman 
                WHERE statuspeminjaman = 'approve' and tbpeminjaman.NIK = '$nik'");
                while($result = mysqli_fetch_array($data_warn))
                {

                $masaaktif = $result['tgl_pengembalian']; 
                $sekarang = date("d-m-Y"); 
                $masaberlaku = strtotime($masaaktif) - strtotime($sekarang); 
                if($masaberlaku/(24*60*60)<1) 
                { 
                    echo "<div class='col-lg-12'>
                    <div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> 
                    Waktu Peminjaman dengan kode barang &nbsp; ".
                    $result['kode_aset']." &nbsp; Sudah Habis, Silahkan Pilih Button Kembali Untuk Pengembalian Barang!!
                   <a class='pull-right' data-dismiss='alert'><em class='fa fa-lg fa-close'></em></a>
                    </div></div>
                    ";
                } 

                else if($masaberlaku/(24*60*60)<7) 
                { 

                    echo "<div class='col-lg-12'>
                    <div class='alert bg-warning' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> ".$masaberlaku/(24*60*60)." hari lagi"; 
                    echo "&nbsp; Peminjaman Dengan Kode Barang
                     ".$result['kode_aset']." &nbsp; Akan Habis Masa Peminjamannya!!!
                     <a class='pull-right' data-dismiss='alert'><em class='fa fa-lg fa-close'></em></a>
                    </div></div>
                    " ; 
                } 
                }
                ?>
</div></div>
<br>    

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>
              <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>NIK</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>kondisi</th>
                <th>Kegiatan</th>
                <th>Jumlah Pesanan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Action</th>
               

            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbpeminjaman.kodep,tbpeminjaman.NIK, tbpeminjaman.kode_aset, tbaset.nama_aset, tbaset.kondisi_aset, tbpeminjaman.kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian
                FROM tbpeminjaman
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                WHERE  statuspeminjaman = 'approve' and tbpeminjaman.NIK = '$nik'");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kodep']."</td>
                    <td>".$data['NIK']."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kondisi_aset']."</td>
                    <td>".$data['kegiatan']."</td>
                    <td>".$data['jumlah_pesanan']."</td>
                    <td>".$data['tgl_peminjaman']."</td>
                    <td>".$data['tgl_pengembalian']."</td>
                   
                    <td>
                    <a href='cetakapprove.php?kodep=".$data['kodep']."'>
                    <button class='btn btn-outline-info btn-xs btn-primary' data-toggle='tooltip' title='Cetak Pdf'>
                    <i class='fa  fa-file-pdf-o'></i></button></a> 

                    <a href='batalpeminjaman.php?kodep=$data[kodep]'>
                    <button class='btn btn-outline-danger btn-xs btn-danger' data-toggle='tooltip' title='Cancel'>
                    <i class='fa  fa-close'></i></button></a> 

                     <a href='barangkembali.php?kodep=$data[kodep]'>
                    <button class='btn btn-outline-danger btn-xs btn-info' data-toggle='tooltip' title='Return of Items'>
                    <i class='fa   fa-repeat'></i></button></a> 
                    </td>
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
     
     catatan : <br>
     1. Form ini Adalah Data Barang yang Telah disetujui, Silahkan Cetak Form Pada Button PDF<BR>
     2. Silahkan Batalkan Peminjaman Dengan Menekan Button x<br>
     3. Lakukan Pengembalian Barang dengan Menekan Button Kembali  
                        
                    </div>
                </div>
<BR>
                <div class="row">
            <div class="col-md-12">
             <div class="panel panel-default">
                    <div class="panel-heading">
                        Inventory Loan on This Month
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em>
                        </span>
                       </div>
                       <div class="panel-body">
                       
                                
                <table id="infokendaraan" class="table-data table table-striped table-hover">
                <thead>
                <tr class="info">
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Nama</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Kondisi Aset</th>
                <th>Kegiatan</th>
                <th>Jumlah Pesanan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                </tr>
                </thead>

                <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT 
tbpeminjaman.kodep,tbuser.nama_user, tbpeminjaman.kode_aset, tbaset.nama_aset, tbaset.kondisi_aset, tbpeminjaman.kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian 
FROM tbpeminjaman 
INNER JOIN tbuser ON tbuser.NIK = tbpeminjaman.NIK 
INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
WHERE statuspeminjaman = 'approve' AND month (tgl_peminjaman)= month (CURDATE());

                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kodep']."</td>
                    <td>".$data['nama_user']."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kondisi_aset']."</td>
                   <td>".$data['kegiatan']."</td>
                    <td>".$data['jumlah_pesanan']."</td>
                    <td>".$data['tgl_peminjaman']."</td>
                    <td>".$data['tgl_pengembalian']."</td>
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
              
    </tbody>
    </table> 
    </div>
    </div>


      <!--/.col-->
 <!--Tutup MainBar-->
            


<!--Footer-->
            <div class="row">
            <div class="col-md-12">          
      

        <div class="panel-heading1">  
        <div class="panel panel-footer">  
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>  <!--/.main-->
    
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


<!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->

               
</body>
</html>
            
