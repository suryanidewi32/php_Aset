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
    <link href="css/styles.css" rel="stylesheet">
 <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
 
<link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
            <li class=""><a href="posisibarang.php"><em class="fa  fa-location-arrow">&nbsp;</em> Position of Lend</a></li>
            <li class="active"><a href="jadwal.php"><em class="fa  fa-calendar">&nbsp;</em> Lend Schadule</a></li>
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
                <li><a href="halperlengkapan.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Lend Schadule</li>
            </ol>
        </div><!--/.row-->

        
         <div class="row">
            <div class="col-md-12">
                 <?php
         $i = 0 + 1;
$con = mysqli_connect("localhost","root","","dbasetpeminjaman");
if(isset($_POST['filter1']))
{
    $from_date =$_POST['from_date'];
    $to_date =$_POST['to_date'];
  $sql1 = mysqli_query($con, "SELECT tbuser.nama_user, tbaset.nama_aset, tbpeminjaman.kegiatan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian
                FROM tbpeminjaman
                INNER JOIN tbuser ON tbuser.NIK = tbpeminjaman.NIK 
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                WHERE tgl_peminjaman BETWEEN '$from_date' AND '$to_date' and statuspeminjaman = 'approve'
");
 
}
?>
<form  name="form1"  method="POST">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Peminjaman &nbsp; </h3>
              </div>
              <div class="col-md-3">  
                     <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="submit" name="filter1" id="filter1" value="Filter"  class="btn btn-success"/>  
                </div>  
                <div style="clear:both"></div> 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr tr class="info">
                  <th style="text-align: center;">No</th>
                  
                  <th>Nama User</th>
                  <th>Nama Aset</th>
                  <th>Kegiatan</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Tanggal Pengembalian</th>
                 
                  <th style="text-align: center;" ></th>
                </tr>
                </thead>
                
                <tbody>
                  <?php
                  if(isset($_POST['filter1']))
{
        while ($hasil = mysqli_fetch_array($sql1)){
          ?>
                <tr>
                    <td style="text-align: center;"><?php echo $i; ?></td>
        
      <td><?php echo $hasil['nama_user']; ?></td>
      <td><?php echo $hasil['nama_aset']; ?></td>
      <td><?php echo $hasil['kegiatan']; ?></td>
      <td><?php echo $hasil['tgl_peminjaman']; ?></td>
      <td><?php echo $hasil['tgl_pengembalian']; ?></td>
      
      <td style="text-align: center;">
     </td>
                 </tr>
                </tbody>
               <?php
               
              
      $i++;
      }
    }
    ?>
              </table>
              </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Peminjaman Inventaris di Bulan ini
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
                </tr>
                </thead>

                <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT 
tbpeminjaman.kodep,tbpeminjaman.NIK, tbpeminjaman.kode_aset, tbaset.nama_aset, tbaset.kondisi_aset, tbpeminjaman.kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman 
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
                        Inventaris yang Belum Pernah di Pinjam
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em>
                        </span>
                       </div>
                       <div class="panel-body">
                       
                                
                <table id="infokendaraan" class="table-data table table-striped table-hover">
                <thead>
                <tr class="info">
                <th>No</th>
                <th>Nama Aset</th>
                <th>Kode Aset</th>
                <th>Kelompok Aset</th>
                </tr>
                </thead>

                <tbody>

                    <?php

            $result=mysqli_query($connection, "SELECT tbpengadaan.nama_aset,tbaset.kode_aset,tbaset.kelompok_aset
FROM tbaset
INNER JOIN tbpengadaan ON tbpengadaan.kode_aset=tbaset.kode_aset
WHERE tbaset.kode_aset NOT IN (SELECT tbpeminjaman.kode_aset FROM tbpeminjaman) AND tbaset.kelompok_aset in ('Kendaraan', 'Elektronik', 'Gedung') and tbaset.status='Tersedia'
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kode_aset']."</td>
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
      
    
  <div class="row">
            <div class="col-md-12">          
                <div class="panel panel-default">

        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>
</div>
</div>

            
   
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
</body>
</html>