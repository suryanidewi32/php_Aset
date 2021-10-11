<?php
include('cekpeminjam.php');
include('connection.php');
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
             <li class="active"><a href="daftarinventaris.php"><em class="fa  fa-th-list">&nbsp;</em> List of Items</a></li>
           
           <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-history">&nbsp;</em> History <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
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
    	

	<!-- tabel Barang -->	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="pinjam.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">List of Items</li>
			</ol>
		</div><!--/.row-->
					
		

		<div class="row">
            <div class="col-lg-12">
                <h2>List of Inventory Items</h2>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Electronic</a></li>
                            <li><a href="#tab2" data-toggle="tab">Vehicle</a></li>
                            <li><a href="#tab3" data-toggle="tab">Building</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <h4>Electronic List </h4>
                               <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Kelompok</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Kondisi</th>
                <th>Posisi</th>
                <th>Stock</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT daftarinventaris.kode_aset, tbaset.nama_aset, tbaset.kelompok_aset, daftarinventaris.jns, daftarinventaris.merk, tbaset.kondisi_aset, daftarinventaris.posisi, tbaset.stock
                FROM daftarinventaris
                INNER JOIN tbaset ON tbaset.kode_aset = daftarinventaris.kode_aset 
                WHERE stock >'0' and jns in ('Laptop','DSLR','Handycam') and status='Tersedia'  ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['jns']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['kondisi_aset']."</td>
                    <td>".$data['posisi']."</td>
                    <td>".$data['stock']."</td>

                    <td>
                    <a href='tambahpeminjaman.php?kode_aset=$data[kode_aset]'>
                    <button class='btn btn-outline-info btn-sm btn-primary' data-toggle='tooltip' title='Loan of Items'>
                    <i class='fa fa-edit'></i></button></a> 
               
                    </td>
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
                            </div></div>
                </div> </div>
                </div>



        
                            <div class="tab-pane fade" id="tab2">
                                <h4>List of Vehicles</h4>
                               <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode</th>
                <th>Kelompok</th>
                <th>Nama</th>
                <th>Jenis Kendaraan</th>
                <th>No. Kendaraan</th>
                <th>Merk</th>
                <th>Thn. Pembuatan</th>
                <th>Kondisi</th>
                <th>Posisi</th>
                <th>Stock</th>
                 <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbkendaraan.kode_aset, tbaset.kelompok_aset, tbaset.nama_aset, tbkendaraan.jns, tbkendaraan.no_kendaraan,tbkendaraan.merk, tbkendaraan.thn_pembuatan,  tbaset.kondisi_aset, tbkendaraan.posisi, tbaset.stock
                FROM tbkendaraan
                INNER JOIN tbaset ON tbaset.kode_aset = tbkendaraan.kode_aset 
                WHERE stock >'0'  and status='Tersedia' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                     <td>".$data['nama_aset']."</td>
                    <td>".$data['jns']."</td>
                    <td>".$data['no_kendaraan']."</td>
                    <td>".$data['merk']."</td>
                    <td>".$data['thn_pembuatan']."</td>
                    <td>".$data['kondisi_aset']."</td>
                    <td>".$data['posisi']."</td>
                    <td>".$data['stock']."</td>

                    <td>
                    <a href='tambahpeminjaman.php?kode_aset=$data[kode_aset]'>
                    <button class='btn btn-outline-info btn-sm btn-primary' data-toggle='tooltip' title='Pinjam Barang'>
                    <i class='fa fa-edit'></i></button></a> 
               
                    </td>
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> 
                            </div></div>
                </div> </div>
                </div>

                            <div class="tab-pane fade" id="tab3">
                                <h4>List of Buildings</h4>
                               <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php
$tgl=date('l, d-m-Y');
echo $tgl;
?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example5" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Kelompok</th>
                <th>Luas</th>
                <th>Kondisi</th>
                <th>Posisi</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbgedung.kode_aset, tbaset.nama_aset, tbaset.kelompok_aset, tbgedung.luas_gedung, tbaset.kondisi_aset, tbgedung.posisi, tbaset.stock
                FROM tbgedung 
                INNER JOIN tbaset ON tbaset.kode_aset = tbgedung.kode_aset 
                WHERE stock > '0' and status='Tersedia'  ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td>
                    <td>".$data['luas_gedung']."</td>
                    <td>".$data['kondisi_aset']."</td>
                    <td>".$data['posisi']."</td>
                    <td>".$data['stock']."</td>

                     <td>
                     <a href='tambahpeminjaman.php?kode_aset=$data[kode_aset]'>
                    <button class='btn btn-outline-info btn-sm btn-primary' data-toggle='tooltip' title='Pinjam Barang'>
                    <i class='fa fa-edit'></i></button></a> 
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
        </tbody>
    </table> </div>
                </div></div>
                        </div>
                    </div>
                </div><!--/.panel-->
            </div><!--/.col-->
		
		 				
					</div>
			
        


  <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div>

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