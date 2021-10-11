<?php
include('cekpetugas.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Penyusutan Aset</title>
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
            <li class="parent"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
           <li><a href="newaset.php"><em class="fa fa-edit">&nbsp;</em> New Asset Data</a></li>
             <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em> Component <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="active" href="fixedasset.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Data
                    </a></li>
                    <li><a class="" href="pilihtahun.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Depreciation Data
                    </a></li>
                    <li><a class="" href="penghapusan.php">
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
			<div class="col-md-12">
				<div class="panel panel-default">
				<div class="panel-heading">
						Depreciation Asset
						</div>
					<div class="panel-body">	
                    <div class="box-body">
                        
            <table align="center" font face="tahoma" size="8" class="table table-bordered table-hover">

                <?php
                $kode_aset = $_GET["kode_aset"];
                
                $query="select masa_perkiraan,nama_aktiva,kode_aset,nama_aset,tgl_beli,kelompok_aset,harga_beli,stock1 from tbaset where tbaset.kode_aset='$kode_aset' ";
                $result=mysqli_query($connection,$query);
                if (!$result) {
                echo mysqli_error($connection);
                }
                $data=mysqli_fetch_assoc($result);
                echo "
               
                       <tr>
                <td> Kelompok: </td><td>$data[nama_aktiva]</td>
              
                 <td>  Masa Manfaat: </td><td>$data[masa_perkiraan]</td> 
                </tr>
                
                <tr>
                <td>Tanggal Beli: </td><td>$data[tgl_beli]</td>
                <td>Kode Aset: </td><td>$data[kode_aset] </td> 
                </tr>
                <tr>
                <td>Kelompok Aset: </td><td>$data[kelompok_aset]</td>
                <td>Nama Aset: </td><td>$data[nama_aset]</td></tr>
                ";?>
         </table>

        <div class="box-body">      
        <table id="infokendaraan" class="table-data table table-striped table-hover table-bordered">
        <tbody>
                <?php
                if ($data['nama_aktiva']==1) {
                    $query2=
                    "select nama_aset,tgl_beli,

                    (4/12)*stock1*harga_beli as nilai_perbulan,

                    (stock1*harga_beli )*0.25 as nilai_pertahun,

                    if((date(now())-date(tgl_beli)>=10000),
                    ((year(date(now()))-year(date(tgl_beli)))*0.25)*stock1*harga_beli ,0) as nilai_tahunini
                    from tbaset where nama_aktiva='$data[nama_aktiva]' and kode_aset='$data[kode_aset]'";;
                    $result2=mysqli_query($connection,$query2);
                    
                }
                elseif ($data['nama_aktiva']==2) {
                    $query2=
                    "select nama_aset,tgl_beli,

                    
                    (8/12)*stock1*harga_beli  as nilai_perbulan,

                    (stock1*harga_beli )*12.5 as nilai_pertahun,  

                    if((date(now())-date(tgl_beli)>=10000),
                    ((year(date(now()))-year(date(tgl_beli)))*12.5)*stock1*harga_beli ,0) as nilai_tahunini
                    from tbaset where nama_aktiva='$data[nama_aktiva]' and kode_aset='$data[kode_aset]'";;
                    $result2=mysqli_query($connection,$query2);
                    
                }
                elseif ($data['nama_aktiva']==3) {
                    $query2=
                    "select nama_aset,tgl_beli,

                    
                    (16/12)*stock1*harga_beli  as nilai_perbulan,

                    (stock1*harga_beli )*6.25 as nilai_pertahun,  

                    if((date(now())-date(tgl_beli)>=10000),
                    ((year(date(now()))-year(date(tgl_beli)))*6.25)*stock1*harga_beli ,0) as nilai_tahunini
                    from tbaset where nama_aktiva='$data[nama_aktiva]' and kode_aset='$data[kode_aset]'";;
                    $result2=mysqli_query($connection,$query2);
                    
                }
                elseif ($data['nama_aktiva']==4) {
                    $query2=
                    "select nama_aset,tgl_beli,

                    (20/12)*stock1*harga_beli  as nilai_perbulan,

                    (stock1*harga_beli )*0.05 as nilai_pertahun, 

                    if((date(now())-date(tgl_beli)>=10000),
                    ((year(date(now()))-year(date(tgl_beli)))*0.05)*stock1*harga_beli ,0) as nilai_tahunini
                    from tbaset where nama_aktiva='$data[nama_aktiva]' and kode_aset='$data[kode_aset]'";;
                    $result2=mysqli_query($connection,$query2);
                    
                }   

                $data2=mysqli_fetch_assoc($result2);
                echo "<tr>
                <th>Harga Beli<th> Rp. ".number_format ($data['stock1']*$data['harga_beli'],0,",",".")."</th></th></tr>
                <tr><th>Nilai Buku Perbulan<th> Rp. ".number_format ($data2['nilai_perbulan'],0,",",".")."</th></th></tr>
                <tr><th>Nilai Buku Pertahun<th> Rp. ".number_format ($data2['nilai_pertahun'],0,",",".")."</th></th></tr>
                <tr><th>Nilai Buku Tahun Ini<th> Rp. ".number_format ($data2['nilai_tahunini'],0,",",".")." </th></th></tr>
                ";
                ?>
        </tbody>
        </table> 
        <br><br>

          </div>
        </div>
        <div class="cleaner_h30 horizon_divider"></div>
        <div class="cleaner_h30"></div>       
    </div>
</div>

 <div class="panel panel-default">
        <div class="panel-heading">    
                <p class="back-link">Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></p>
            </div>
        </div><!--/.row-->
    </div>  <!--/.main-->
</div>
</div><!--/.main-->
	

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
<!-- AdminLTE App -->
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
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script type="text/javascript">
  
    function cetakpdf(){

      var nilai_perbulan = $('#nilai_perbulan').val();
      var nilai_pertahun = $('#nilai_pertahun').val();
      var nilai_tahunini = $('#nilai_tahunini').val();

      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/datapenyusutan.php?nilai_perbulan="+nilai_perbulan+"&nilai_pertahun="+nilai_pertahun+"&nilai_tahunini="+nilai_tahunini;

      window.open("");
    }

</script>
</body>
</html>