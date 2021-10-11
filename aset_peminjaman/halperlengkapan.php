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
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
   
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>
        <script type="text/javascript" language="JavaScript">
            function konfirmasi()
            {
                tanya = confirm("Anda Yakin Sudah Membeli Barang Ini ?");
            if (tanya == true)
            return true;
            
            else 
            return false;
            }
        </script>
       
</head>
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
                       </ul>
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
            <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
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
            <li class=""><a href="posisibarang.php"><em class="fa  fa-location-arrow">&nbsp;</em> Position of Lend</a></li>
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
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->
        
       
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
                <th>NIK</th>
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
tbpeminjaman.kodep,tbpeminjaman.NIK, tbpeminjaman.kode_aset, tbaset.nama_aset, tbaset.kondisi_aset, tbpeminjaman.kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian 
FROM tbpeminjaman 
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
                    <td>".$data['NIK']."</td>
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
        
       
        
       <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Loan Verification
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em>
                        </span>
                       </div>
                       <div class="panel-body">
                       
                                
                <table id="infokendaraan" class="table-data table table-striped table-hover">
                <thead>
                <tr class="info">
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>TTD</th>
                <th>Kirim</th>
                </tr>
                </thead>

                <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT tbpeminjaman.kodep, tbuser.nama_user, tbpeminjaman.keteranganmanajer
                FROM tbpeminjaman
                INNER JOIN tbuser ON tbuser.NIK = tbpeminjaman.NIK
                WHERE statuspeminjaman = 'ya'
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kodep']."</td>
                    <td>".$data['nama_user']."</td>
                    <td><img src=img/".$data['keteranganmanajer']." width=60px height=60px></td>
                    <td>
                    <a href='tambahapprove.php?kodep=$data[kodep]'>
                    <button class='btn btn-outline-info btn-sm btn-primary' data-toggle='tooltip' title='Kirim'>
                    <i class='fa fa-upload '></i></button></a> 
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
      
    </div> 
    <!-- end menu kendaraan -->


    <!-- menu Pengguna -->
    

</div>
<div class="row">
            <div class="col-md-12">          
                <div class="panel panel-default">
                      <div class="panel-heading">   
                       Asset Must be Purchase
                       
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em>
                        </span>
                        </div>
                    
                    <div class="panel-body">
                    <table id="infoprofil" class="table-data table table-striped table-hover">
                    <thead>
                        <tr class="success">
                        <th>No</th>
                        <th>Kode Pengajuan</th>
                        <th>Nama Barang</th>
                        <th>Kelompok</th>
                        <th>Merk</th>
                        <th>Perkiraan Harga</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                             <?php

            $result=mysqli_query($connection, "SELECT * FROM tbpengadaan
                WHERE status = 'Approved' and statusbarang = ''
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['koder']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td> 
                    <td>".$data['merk']."</td> 
                    <td>".$data['harga']."</td> 
                    <td>

                    <a href='cetakpembelian.php?koder=".$data['koder']."'>
                    <button class='btn btn-outline-info btn-xs btn-primary' data-toggle='tooltip' title='Cetak Pdf'>
                    <i class='fa  fa-file-pdf-o'></i></button>

                    <a href='proses/prosespembelian.php?koder=$data[koder]' onclick='return konfirmasi()'>
                    <button class='btn btn-success btn-xs' data-toggle='tooltip' title='Beli'>
                                <i class='glyphicon glyphicon-ok'></i></button></a> 

                    <a href='barangkosong.php?koder=$data[koder]'>
                    <button class='btn btn-outline-danger btn-xs btn-info' data-toggle='tooltip' >
                    <i class='fa   fa-remove '></i></button></a> 
                  
                    
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
     2. Lakukan Konfirmasi Barang jika barang Sudah di beli<br>
     3. Jika Barang yang diajukan Tidak Tersedia Silahkan Memilih Button X  
    
    </div>
                </div>
                </div>
                </div> 

                 <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Barang Inventaris yang Sering di Pinjam
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em>
                        </span>
                       </div>
                       <div class="panel-body">
                       
                                
                <table id="infokendaraan" class="table-data table table-striped table-hover">
                <thead>
                <tr class="info">
                <th>No</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Kelompok Aset</th>
                </tr>
                </thead>

                <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT tbaset.kode_aset,tbaset.nama_aset,tbaset.kelompok_aset from tbaset INNER JOIN tbpeminjaman ON tbaset.kode_aset=tbpeminjaman.kode_aset WHERE tbaset.kode_aset IN (SELECT kode_aset from tbpeminjaman) ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                   </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
              
    </tbody>
    </table> 
    </div>
    </div>
      
           
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
<!--Tutup Footer-->


    
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->
