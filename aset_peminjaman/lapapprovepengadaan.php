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

    <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>
        <script type="text/javascript" language="JavaScript">
            function konfirmasi()
            {
                tanya = confirm("Anda Yakin Akan Menghapus Data Ini ?");
            if (tanya == true)
            return true;
            
            else 
            return false;
            }
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
                
               </a></li>
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
            <em class="fa fa-file-o">&nbsp;</em> Reports  <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span></a>
                <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="lappeminjaman.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Loan Report
                    </a></li>
                <li><a class="" href="dir.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> List Inventory Report
                    </a></li>
                <li><a class="" href="penanggungdir.php">
                    <span class="fa fa-arrow-right">&nbsp;</span> Report PIC
                    </a></li>
                    <li><a class="active" href="pengadaanbarang.php">
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

                

    <!-- tabel aset --> 
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Procurement Report</li>
            <li><?php
$tgl=date('l, d-m-Y');
echo $tgl;
?></li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div>
                    
        

        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading" align="center" >
                        Procurement Report
                        </div>

                    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
       
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 <a href='pengadaanbarang.php'>
                    <button class='btn btn-outline-info btn-sm btn-default' data-toggle='tooltip' title='pilih tahun'> Select by Year
                    </button></a>
              <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">
               <th >No</th>
                <th>Nama Aset</th>
                <th>Kelompok Aset</th>
                <th>Merk</th>
                <th> Posisi</th>
                <th>Tujuan</th>
                <th>Jumlah Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah Harga</th>
                <th>Tanggal Pengajuan</th>
                <th>Nama Pengaju</th>
                <th>TTD Man.Umum</th>
                <th>TTD Man.Akun</th>
                
            </tr>
        </thead>
        <tbody>
        <?php ob_start(); ?>

     <?php 
     $startdate = $_GET['tgl_a'];
     $enddate = $_GET['tgl_b'];

     if(isset($startdate) && isset($enddate) ){

     $where = "and tgl_pengajuan>='".$startdate."'and tgl_pengajuan<='".$enddate."'";

     }
     $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
            $result=mysqli_query($connection, "SELECT tbpengadaan.nama_aset, tbpengadaan.kelompok_aset, tbpengadaan.merk, tbpengadaan.posisi, tbpengadaan.tujuan, tbpengadaan.stock1, tbpengadaan.harga, tbpengadaan.tgl_pengajuan, tbuser.nama_user, tbpengadaan.keterangan, tbpengadaan.keteranganakun 
                FROM tbpengadaan
                INNER JOIN tbuser ON tbuser.NIK=tbpengadaan.NIK
                WHERE status ='Approved'".$where);
                $no=1;
      $total=0;
             if(@$_POST['datapengadaan']){
            $result = $result->result(@$_POST['tgl_a'], @$_POST['tgl_b']);
          }
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['posisi']."</td>
                    <td>".$data['tujuan']."</td>
                    <td>".$data['stock1']."</td>
                     <td>Rp.".number_format($data['harga'],0,",",".")."</td>
                    <td>Rp.".number_format($data['stock1']*$data['harga'],0,",",".")."</td>
                   <td>".$data['tgl_pengajuan']."</td>
                    <td>".$data['nama_user']."</td>
                    <td><img src=img/".$data['keterangan']." width=60px height=60px></td>
                    <td><img src=img/".$data['keteranganakun']." width=60px height=60px></td>
                    </tr> 
                    ";
                    $no=$no+1;
                      $total=$total+($data['stock1']*$data['harga']);
                }
    
        ?>
        </tbody>
        <tr><td></td></tr>
          <tr class ="active">

          <th> </th><th> Jumlah: </th> <td> <td> <td> <td><td></td></td></td></td></td></td></td><td></td>
            <th> Rp.<?php echo number_format ($total ,0,",",".") ; ?></th><th></th><th></th><th></th><th></th>
    </tr>
    </table>
    <br>
    <br>
      <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#cetakpdff"><i class=" fa fa-print"></i> Print by Year</a>
                 
        <?php
        include "modalapprovedpengadaan.php";
        ?>   
       
                        
                    </div>
                </div>
        <div class="cleaner_h30 horizon_divider"></div>
        <div class="cleaner_h30"></div>       
    </div>
</div>

<div class="cleaner"></div>
</div>
        



                </div>
            </div><!-- /.col-->
            
            <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>
    

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
     <script type="text/javascript">
  
    function cetakpdff(){

      var tgl_a = $('#tgl_a').val();
      var tgl_b = $('#tgl_b').val();
      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/cetaklaporanpengadaan.php?tgl_a="+tgl_a+"&tgl_b="+tgl_b;

      window.open(urlcetak,'_self');
    }

</script>

</body>
</html>