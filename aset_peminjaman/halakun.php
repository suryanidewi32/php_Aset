<?php
include('cekpetugas.php');
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=no">
    <title>Halaman Petugas Keuangan</title>
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
            <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
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
                    <li><a class="" href="penghapusan.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Asset Deletion Data
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

         <div class="panel panel-default">
                    <div class="panel-heading">
                        List Asset Deletion Data
                      
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em>
                        </span>
                        </div>
                    
                    
                    <div class="panel-body">
                    <table id="infopenghapusan" class="table-data table table-striped table-hover">
                    <thead>
                        <tr class ="info">
                        <th>No</th>
                        <th>Kode Aset</th>
                        <th>Nama Aset</th>
                        <th>Tanggal Input</th>
                        <th></th>
                        </tr>
                        </thead>
                        <tbody>
        
                                <?php
                                $result=mysqli_query($connection, "select * from tbaset where nama_aktiva='4' and date(tgl_beli)<=now()-INTERVAL 20 YEAR and status in ('','Tersedia')
                                UNION
                                select * from tbaset where nama_aktiva='1' and date(tgl_beli)<=now()-INTERVAL 4 YEAR and status in ('','Tersedia')
                                UNION
                                select * from tbaset where nama_aktiva='2' and date(tgl_beli)<=now()-INTERVAL 5 YEAR and status in ('','Tersedia')
                                UNION
                                select * from tbaset where nama_aktiva='3' and date(tgl_beli)<=now()-INTERVAL 10 YEAR and status in ('','Tersedia')");

                                $no=1;
                                while ($data = mysqli_fetch_array($result))
                                {
                                echo "    
                                <tr>
                                <td>".$no."</td>
                                <td>".$data['kode_aset']."</td>
                                <td>".$data['nama_aset']."</td>
                                <td>".$data['tgl_input']."</td>

                                 <td><a href='tambahpenghapusan.php?kode_aset=$data[kode_aset]'>
                                 <button class='btn btn-outline-info btn-sm btn-danger' data-toggle='tooltip' title='Penghapusan'>
                                 <i class='fa fa-edit'></i></button></a> </td>
                   </tr> 
                            ";
                            $no=$no+1;
                            }
                            ?>
    </tbody>
    </table> 
    </span> 
    </div>
    </div>


        
<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Action</h1>
            </div>
        </div><!--/.row-->
        
        <div class="row">
           
            <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <div class="easypiechart" id="easypiechart-blue" data-percent="100" ><span class="percent"><a href="newaset.php"><em class="fa fa-sm  fa-edit color-blue" title="New Asset Data"></em></span></a></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <div class="easypiechart" id="easypiechart-orange" data-percent="100" ><span class="percent"><a data-toggle="modal" data-target="#tampil"> <em class="fa fa-sm  fa-folder-open-o color-orange" title="Asset Depreciation Data"></em></span></a>
                        <?php
        include "modaltampil.php";
        ?>

        </div>
                    </div>
                </div>
            </div>
           
        </div><!--/.row-->
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


    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function () {
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
    responsive: true,
    scaleLineColor: "rgba(0,0,0,.2)",
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleFontColor: "#c5c7cc"
    });
};
    </script>

    <script type="text/javascript">
  
    function tampil(){

      var tgl_a = $('#tgl_a').val();
      var tgl_b = $('#tgl_b').val();
      var kel = $('#kel').val();
      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/datapenyusutan.php?tgl_a="+tgl_a+"&tgl_b="+tgl_b+"&kel="+kel;

      window.open(urlcetak,'_self');
    }

</script>
        
</body>
</html>
            
