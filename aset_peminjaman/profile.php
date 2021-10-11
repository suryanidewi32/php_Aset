<?php
include('connection.php');
session_start();
$nik = $_SESSION['nik'];

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Karyawan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Fixed Aset Manajemen</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li ></li>
            <li></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="pengadaan.php">Procurement of Items</a></li>
                <li><a href="pinjam.php">Loan of Items</a></li>
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              
              <ul class="dropdown-menu">
               
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              
              <ul class="dropdown-menu">
               
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              
              <ul class="dropdown-menu">
                
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="img/user.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="img/user.jpg" class="img-circle" alt="User Image">
<?php

            // $nik = $_SESSION['NIK'];

            $result=mysqli_query($connection, "SELECT * FROM tbuser
            WHERE tbuser.NIK = '$nik' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
               
                   
                     echo "  
                  <p>
                    ".$data['nama_user']."
                    <small>".$data['bagian']."</small>
                  </p>
               
                ";
                    $no=$no+1;
                }
    
        ?> 
        </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    
                   
                    
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                   <div class="pull-left">
                    <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>
<div class="row">
           
        <br>
        <br>
      <!-- Main content -->
      <section class="content">
                  <div class="box box-solid">
            <div class="box-header with-border">
         <h2 class="page-header" align="center">Profile</h2><br>

     
        <!-- /.col -->
        
            <!-- /.box-header -->
           
<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="img/user.jpg" alt="User profile picture">
              <?php

            // $nik = $_SESSION['NIK'];

            $result=mysqli_query($connection, "SELECT * FROM tbuser
            WHERE tbuser.NIK = '$nik' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
               
                   
                     echo "  
                  <h3 class='profile-username text-center'>
                    ".$data['nama_user']."</h3>
                   <p class='text-muted text-center'>".$data['NIK']."</p>
                  </p>
               
                ";
                    $no=$no+1;
                }
    
        ?> 

            

      

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Jabatan</strong>
 <?php

            // $nik = $_SESSION['NIK'];

            $result=mysqli_query($connection, "SELECT * FROM tbuser
            WHERE tbuser.NIK = '$nik' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
               
                   
                     echo "  
              <p class='text-muted'>
               ".$data['jabatan']."
              </p>

              <hr>

              <strong><i class='fa  fa-user margin-r-5'></i> Bagian</strong>

              <p class='text-muted'>".$data['bagian']."</p>
                ";
                    $no=$no+1;
                }
    
        ?> 

              <hr>

              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div></div></div>
              
               <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="img/user.jpg" alt="user image">
                        <span class="username">
                           <?php

            // $nik = $_SESSION['NIK'];

            $result=mysqli_query($connection, "SELECT * FROM tbuser
            WHERE tbuser.NIK = '$nik' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
               
                   
                     echo " 
                          <a href='profile.php'>".$data['nama_user']."</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                    <span class='description'>Meminjam Barang Inventaris</span>
                      ";
                    $no=$no+1;
                }
    
        ?> 
                  </div>
                  <!-- /.user-block -->
                  <p>
                     <table id="example1" class="table table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">

                <th>No</th>
                <th>Nama Barang</th>
                <th>Kegiatan</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $result=mysqli_query($connection, "SELECT tbaset.nama_aset, tbpeminjaman.kegiatan, tbpeminjaman.jumlah_pesanan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian
                FROM tbpeminjaman
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                WHERE  statuspeminjaman = 'approve' and tbpeminjaman.NIK = '$nik'");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['nama_aset']."</td>
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
                  </p>
                     </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="img/user.jpg" alt="User Image">
                        <span class="username">
                           <?php

            // $nik = $_SESSION['NIK'];

            $result=mysqli_query($connection, "SELECT * FROM tbuser
            WHERE tbuser.NIK = '$nik' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
               
                   
                     echo " 
                          <a href='#'>".$data['nama_user']."</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                    <span class='description'>Merequest Pembelian Aset Baru</span>
                     ";
                    $no=$no+1;
                }
    
        ?>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <table id="infoprofil" class="table-data table table-striped table-hover">
                    <thead>
                        <tr class="success">
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kelompok</th>
                        <th>Merk</th>
                        <th>Perkiraan Harga</th>
                        </tr>
                        </thead>
                        <tbody>

                             <?php

            $result=mysqli_query($connection, "SELECT * FROM tbpengadaan
                WHERE status = ''
                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td> 
                    <td>".$data['merk']."</td> 
                    <td>".$data['harga']."</td> 
                   
                   
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
                        
                       
      </tbody>
    </table> 
                  </p>
                     </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="img/user.jpg" alt="User Image">
                        <span class="username">
                           <?php

            // $nik = $_SESSION['NIK'];

            $result=mysqli_query($connection, "SELECT * FROM tbuser
            WHERE tbuser.NIK = '$nik' ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
               
                   
                     echo " 
                          <a href='#'>".$data['nama_user']."</a>
                          <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
                        </span>
                    <span class='description'>Peminjaman yang Jatuh Tempo</span>
                     ";
                    $no=$no+1;
                }
    
        ?>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <table id="infoprofil" class="table-data table table-striped table-hover">
                    <thead>
                        <tr class="success">
                        <th>No</th>
                        <th>Kode Aset</th>
                        <th>Nama Aset</th>
                        <th>Kelompok Aset</th>
                        <th>Kegiatan</th>
                        <th>NIK</th>
                        <th>Nama User</th>
                        </tr>
                        </thead>
                        <tbody>

                             <?php

            $result=mysqli_query($connection, "SELECT tbaset.kode_aset, tbaset.nama_aset, tbaset.kelompok_aset, tbpeminjaman.kegiatan, tbpeminjaman.NIK, tbuser.nama_user,DATE_ADD(tgl_peminjaman, INTERVAL 7 DAY) as jatuh_tempo, DATEDIFF(DATE_ADD(tgl_peminjaman, INTERVAL 7 DAY), CURDATE()) as selisih FROM tbpeminjaman 
INNER JOIN tbaset ON tbaset.kode_aset=tbpeminjaman.kode_aset
INNER JOIN tbuser ON tbuser.NIK=tbpeminjaman.NIK
WHERE statuspeminjaman='Approve' and tbpeminjaman.NIK = '$nik'

                ");
            
            $no=1;
                while ($data = mysqli_fetch_array($result))
            
                {
                echo "    
                    <tr>
                    <td>".$no."</td>
                    <td>".$data['kode_aset']."</td>
                    <td>".$data['nama_aset']."</td>
                    <td>".$data['kelompok_aset']."</td> 
                    <td>".$data['kegiatan']."</td> 
                    <td>".$data['NIK']."</td> 
                    <td>".$data['nama_user']."</td>
                   
                   
                    
                    </tr> 
                    ";
                    $no=$no+1;
                }
    
        ?>
                        
                       
    </tbody>
    </table>

                  </p>





                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        
                      </div>
                      <div class="col-sm-3">
                       
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                     </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                        </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                           <br>
                         </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                  
                    <li class="pull-right">
                     
                  </ul>

                   </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
             
              <!-- /.tab-pane -->

           <?php

    $result=mysqli_query($connection, "SELECT * FROM tbuser
            WHERE tbuser.NIK = '$nik'");

    $data = mysqli_fetch_array($result);
?>

              <div class="tab-pane" id="settings">
             
                <form class="form-horizontal"  action='proses/proseseditprofile.php' method='POST' autocomplete="off" enctype="multipart/form-data" onsubmit="return validasi_input(this)">

                <div class="form-group">
                     <div class="form-group">
                    <label for="NIK" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="NIK" id="NIK"  value="<?php echo $data['NIK']?>" placeholder="NIK" onkeypress="return hanyaAngka(event)" minlength="1" maxlength="20" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    
                    <label for="nama_user" class="col-sm-2 control-label">Nama User</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_user" id="nama_user"  value="<?php echo $data['nama_user']?>" placeholder="Nama User" minlength="1" maxlength="50" >
                    </div>
                  </div>
                   

                  <div class="form-group">
                    <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php echo $data['jabatan'] ?>" placeholder="Jabatan" minlength="1" maxlength="30">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="bagian" class="col-sm-2 control-label">Bagian</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="bagian" value="<?php echo $data['bagian'] ?>" id="bagian" placeholder="Bagian" minlength="1" maxlength="30">
                    </div>
                  </div>

                 
                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10"">
                      <input type="text" class="form-control" name="username" id="username" value="<?php echo $data['username'] ?>" placeholder="Username" minlength="1" maxlength="10">

                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button   name="simpan" class="btn btn-danger">Edit Profile</button>
                    </div>
                  </div>
                
                  
                 
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div> </div>
 </div>

      <!-- /.row -->
      <!-- END ACCORDION & CAROUSEL-->

        <!-- ./col -->
       
      </div>
      <!-- /.row -->

          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">

      </div>
      <strong>Fixed Aset Manajemen <a href="http://metistech.net/">metistech.net</a></strong> 
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
