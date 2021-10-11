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

        
    <!--MainBar-->
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="pinjam.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Waiting For Approval</li>
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
              <h3 class="box-title"> Data Peminjaman Elektronik</h3>
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
                <th>Kode Barang</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>Kegiatan</th>
                <th>Lokasi Kegiatan</th>
                <th>Jumlah Pesanan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php

            // $nik = $_SESSION['NIK'];

            $result=mysqli_query($connection, "SELECT tbpeminjaman.kodep,tbpeminjaman.NIK, tbpeminjaman.kode_aset, daftarinventaris.jns, tbaset.nama_aset, daftarinventaris.merk, tbpeminjaman.kegiatan, tbpeminjaman.lokasi_kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian
                FROM tbpeminjaman
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                INNER JOIN daftarinventaris ON daftarinventaris.kode_aset = tbpeminjaman.kode_aset  
                WHERE  jns in ('Laptop','DSLR','Handycam') and statuspeminjaman in ('Menunggu') and tbpeminjaman.NIK = '$nik' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                     
                     <td>".$data['kodep']."</td>
                     <td>".$data['NIK']."</td>
                    <td>".$data['kode_aset']."</td>
                     <td>".$data['jns']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['kegiatan']."</td>
                    <td>".$data['lokasi_kegiatan']."</td>
                    <td>".$data['jumlah_pesanan']."</td>
                    <td>".$data['tgl_peminjaman']."</td>
                    <td>".$data['tgl_pengembalian']."</td>

                     <td>
                    <a href='editpeminjaman.php?kode_aset=$data[kode_aset]'>
                    <button class='btn btn-outline-info btn-xs btn-success' data-toggle='tooltip' title='Edit Loan of Items'>
                    <i class='fa fa-edit'></i></button></a> 

                     <a href='batalpeminjaman.php?kodep=$data[kodep]'>
                    <button class='btn btn-outline-info btn-xs btn-danger' data-toggle='tooltip' title='Cancel Loan of Items'>
                    <i class='fa fa-remove '></i></button></a> 
 
                    </td>
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
        
                        
                    </div>
                </div>


                 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Data Peminjaman Kendaraan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>
              <table id="example3" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>NIK</th>
                <th>Kode Barang</th>
                <th>Jenis</th>
                <th>Nama Barang</th>
                <th>Merk</th>
                <th>No. Kendaraan</th>
                <th>Kegiatan</th>
                <th>Lokasi Kegiatan</th>
                <th>Jumlah Pesanan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbpeminjaman.kodep, tbpeminjaman.NIK, tbpeminjaman.kode_aset, tbkendaraan.jns, tbaset.nama_aset, tbkendaraan.merk, tbkendaraan.no_kendaraan, tbpeminjaman.kegiatan, tbpeminjaman.lokasi_kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian
                FROM tbpeminjaman
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                INNER JOIN tbkendaraan ON tbkendaraan.kode_aset = tbpeminjaman.kode_aset  
                WHERE  statuspeminjaman in ('Menunggu') and tbpeminjaman.NIK = '$nik'");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kodep']."</td>
                    <td>".$data['NIK']."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['jns']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['no_kendaraan']."</td>
                    <td>".$data['kegiatan']."</td>
                    <td>".$data['lokasi_kegiatan']."</td>
                    <td>".$data['jumlah_pesanan']."</td>
                    <td>".$data['tgl_peminjaman']."</td>
                    <td>".$data['tgl_pengembalian']."</td>

                     <td>
                    <a href='editpeminjaman.php?kode_aset=$data[kode_aset]'>
                    <button class='btn btn-outline-info btn-xs btn-success' data-toggle='tooltip' title='Edit Peminjaman'>
                    <i class='fa fa-edit'></i></button></a> 

                    <a href='batalpeminjaman.php?kodep=$data[kodep]'>
                    <button class='btn btn-outline-info btn-xs btn-danger' data-toggle='tooltip' title='Batal Peminjaman'>
                    <i class='fa fa-remove '></i></button></a> 

                    </td>
 
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
        
                        
                    </div>
                </div>
        

        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Data Peminjaman Gedung</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>
              <table id="example5" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>NIK</th>
                <th>Kode Gedung</th>
                <th>Nama Gedung</th>
                <th>Kelompok</th>
                <th>Luas Gedung</th>
                <th>Kegiatan</th>
                <th>Lokasi Kegiatan</th>
                <th>Jumlah Pesanan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbpeminjaman.kodep, tbpeminjaman.NIK, tbpeminjaman.kode_aset, tbaset.nama_aset, tbaset.kelompok_aset, tbgedung.luas_gedung,tbpeminjaman.kegiatan, tbpeminjaman.lokasi_kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian
                FROM tbpeminjaman
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                INNER JOIN tbgedung ON tbgedung.kode_aset = tbpeminjaman.kode_aset  
                WHERE  statuspeminjaman in ('Menunggu') and tbpeminjaman.NIK = '$nik'");
            
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
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['luas_gedung']."</td>
                    <td>".$data['kegiatan']."</td>
                    <td>".$data['lokasi_kegiatan']."</td>
                    <td>".$data['jumlah_pesanan']."</td>
                    <td>".$data['tgl_peminjaman']."</td>
                    <td>".$data['tgl_pengembalian']."</td>

                     <td>
                   <a href='editpeminjaman.php?kode_aset=$data[kode_aset]'>
                    <button class='btn btn-outline-info btn-xs btn-success' data-toggle='tooltip' title='Edit Peminjaman'>
                    <i class='fa fa-edit'></i></button></a> 

                    <a href='batalpeminjaman.php?kodep=$data[kodep]'>
                    <button class='btn btn-outline-info btn-xs btn-danger' data-toggle='tooltip' title='Batal Peminjaman'>
                    <i class='fa fa-remove '></i></button></a> 

                    </td>
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
        
                        
                    </div>
                </div>
                  
       <div class="row">
            <div class="col-md-12">          
      

        <div class="panel-heading1">  
        <div class="panel panel-footer">  
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
<script>
  $(function () {
    $('#example3').DataTable()
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
    $('#example5').DataTable()
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