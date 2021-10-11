<?php
include('cekpetugas.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Penghapusan Aset</title>
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
            <li class=""><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li><a href="newaset.php"><em class="fa fa-edit">&nbsp;</em> New Asset Data</a></li>
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
                    <li><a class="active" href="penghapusan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Deletion Data
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
				<li class="active">Aset</li>
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
              <h3 class="box-title"> Asset Deletion Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead>
                
			<tr class="info">
                <th>No</th>
				<th>Kode Aset</th>
        <th>Tanggal Penghapusan</th>
        <th>Nama</th>
        <th>Kelompok</th>
        <th>Harga</th>
        <th>Posis</th>
        <th>Merk</th>
                <th>Metode Penghapusan</th>
                <th>Harga Penghapusan</th>
                <th>Nama Penerima</th>
                <th>Action</th>
                
			</tr>
		    </thead>
            <tbody>
		<?php 
    	$result=mysqli_query($connection, "
        SELECT tbaset.kode_aset,tbpenghapusan.tgl_penghapusan,tbaset.nama_aset,tbaset.kelompok_aset,tbaset.harga_beli,tbpenghapusan.metode_penghapusan,tbpenghapusan.nilai_residu, tbpenghapusan.nama_penerima,tbpengadaan.posisi, tbpengadaan.merk , tbaset.stock1
FROM tbaset
INNER JOIN tbpenghapusan ON tbpenghapusan.kode_aset=tbaset.kode_aset
INNER JOIN tbpengadaan ON tbpengadaan.kode_aset=tbpenghapusan.kode_aset
");
			
			$no=1;
      $total=0;
			    while ($data = mysqli_fetch_assoc($result)) 
          
        {
        echo "    
					<tr>
                    <td>".$no."</td>
					<td>".$data['kode_aset']."</td>
          <td>".$data['tgl_penghapusan']."</td>
           <td>".$data['nama_aset']."</td>
           <td>".$data['kelompok_aset']."</td>
           <td>Rp.".number_format($data['stock1']*$data['harga_beli'],0,",",".")."</td>
           <td>".$data['posisi']."</td>
                     <td>".$data['merk']."</td>
					<td>".$data['metode_penghapusan']."</td>
                   <td>Rp.".number_format($data['nilai_residu'],0,",",".")."</td>
                     <td>".$data['nama_penerima']."</td>
                     
          
					
                    <td>
                    <a href='editpenghapusan.php?kode_aset=$data[kode_aset]'>
                     <button class='btn btn-outline-info btn-sm btn-info' data-toggle='tooltip' >
                   
                    <i class='fa fa-edit' data-toggle='tooltip' title='Edit Data' ></i></button></a>
                    </td>
				
					</tr> 
					";
					$no=$no+1;
           $total=$total+$data['nilai_residu'];
				}
	
		?>
		</tbody>
    <tr><td></td></tr>
          <tr class ="active">

          <th> Jumlah Pemasukan : </th> <td> <td> <td><td><td><td><td><th></th></td></td></td></td></td></td></td>
            <th> Rp.<?php echo number_format ($total ,0,",",".") ; ?></th>
            <th></th><th></th>
           
	</table> 
   <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#cetakpdfff"><i class=" fa fa-print"></i> Print by Year</a>
                 
        <?php
        include "modalcetakpeghapusan.php";
        ?>
    
		
		 				
					



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
 <script type="text/javascript">
  
    function cetakpdfff(){

      var tgl_a = $('#tgl_a').val();
      var tgl_b = $('#tgl_b').val();

      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/cetakpenghapusan.php?tgl_a="+tgl_a+"&tgl_b="+tgl_b;

      window.open(urlcetak,'_self');
    }

</script>
</body>
</html>