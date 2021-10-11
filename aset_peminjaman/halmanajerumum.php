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
     <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>

<script type="text/javascript">
  function validasi_input(form){
    if (form.kodep.value != ""){
      var x = (form.kodep.value);
      var mincar = 11;
      var status = true;
      var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
      for (i=0; i<=x.length-1; i++)
      {
    if (x[i] in list) cek = true;
    else cek = false;
      } 
        }
       
    if (form.kodep.value == ""){
      alert("Kode Peminjaman harus diisi!");
      form.kodep.focus();
      return (false);

       }

    if (form.statuspeminjaman.value == "pilih"){
      alert("status peminjaman harus diisi!");
      form.statuspeminjaman.focus();
      return (false);
      }
        
    if (form.keteranganmanajer.value == ""){
      alert("TTD  harus diisi!");
      form.keteranganmanajer.focus();
      return (false);
      }
    return (true);
    }
  </script>


<script type="text/javascript">
  function validasi_inputreq(form){
    if (form.koder.value != ""){
      var x = (form.koder.value);
      var mincar = 11;
      var status = true;
      var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
      for (i=0; i<=x.length-1; i++)
      {
      if (x[i] in list) cek = true;
      else cek = false;
      } 
        }
       
      if (form.koder.value == ""){
        alert("Kode Pengajuan harus diisi!");
        form.koder.focus();
        return (false);
       }

    

         if (form.nama_aset.value == ""){
        alert("kode aset harus diisi!");
        form.kode_aset.focus();
        return (false);
        }
        
      if (form.tujuan.value == ""){
        alert("tujuan harus diisi!");
        form.tujuan.focus();
        return (false);
        }
        
      if (form.status.value == "pilih"){
        alert("status harus diisi!");
        form.status.focus();
        return (false);
        }
        
      if (form.keterangan.value == ""){
        alert("keterangan harus diisi!");
        form.keterangan.focus();
        return (false);
        }
  return (true);
  }
</script>
    


<script type="text/javascript">
  function validasi_inputUNLOAN(form){
    if (form.kodep.value != ""){
      var x = (form.kodep.value);
      var mincar = 11;
      var status = true;
      var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
      for (i=0; i<=x.length-1; i++)
      {
    if (x[i] in list) cek = true;
    else cek = false;
      } 
        }
       
    if (form.kodep.value == ""){
      alert("Kode Peminjaman harus diisi!");
      form.kodep.focus();
      return (false);

       }

        if (form.kode_aset.value == ""){
      alert("kode aset harus diisi!");
      form.kode_aset.focus();
      return (false);
      }

    if (form.statuspeminjaman.value == "pilih"){
      alert("status peminjaman harus diisi!");
      form.statuspeminjaman.focus();
      return (false);
      }

      if (form.keterangan.value == "pilih"){
      alert("keterangan harus dipilih!");
      form.keterangan.focus();
      return (false);
      }
        
    if (form.keteranganmanajer.value == ""){
      alert("keterangan  harus diisi!");
      form.keteranganmanajer.focus();
      return (false);
      }
    return (true);
    }
  </script>


<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
  });
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
            <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
            <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-file-o">&nbsp;</em> Reports <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
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
                    <li><a class="" href="pengadaanbarang.php">
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

        
<!--MainBar-->
<!--/row-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Halaman Manajer Bagian Umum</li>
            </ol>
        </div>
<!--/.row-->
        
<br>

<!--/tampilan menu pdf-->
         <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-7 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><a data-toggle="modal" data-target="#cetakpdf"><em class="fa fa-xl  fa-file-pdf-o color-blue"></em></a>
                            
                            <div class="large">Approved</div>

                            <div class="text-muted">Loan Report</div>

                        </div>

                    </div>

                </div>

<?php
        include "modalcetakpeminjaman.php";
        ?></div></div>
                <div class="col-xs-7 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><a data-toggle="modal" data-target="#cetakpdf1"><em class="fa fa-xl fa-file-pdf-o color-red"></em></a>
                            <div class="large">Unapporved</div>
                            <div class="text-muted">Loan Report</div>
                        </div>
                    </div>
                </div>
                 <?php
        include "modalcetaktolakpeminjaman.php";
        ?>
      </div></div>
                <div class="col-xs-7 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><a href="cetakdir.php" ><em class="fa fa-xl fa-file-pdf-o color-teal"></em></a>
                            <div class="large">DIR</div>
                            <div class="text-muted">List Inventory Report</div>
                        </div>
                    </div>
                </div>
               
               
                 <div class="col-xs-7 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><a href="cetakunapprovedpengadaan.php"><em class="fa fa-xl fa-file-pdf-o color-navy"></em></a>
                            <div class="large">Unapproved</div>
                            <div class="text-muted">Unapproved Procurement Report </div>
                        </div>
                    </div>
                </div>

                 <div class="col-xs-7 col-md-4 col-lg-4 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><a href="cetaklaporanpengadaan.php"><em class="fa fa-xl fa-file-pdf-o color-navy"></em></a>
                            <div class="large">Approved</div>
                            <div class="text-muted">Approved Procurement Report </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--/.tampilan menu pdf-->   


       <br>


<!--/tampilan wating loan-->    
        <!--/judul--> 
        <div class="panel panel-default">
          <div class="panel-heading">
            Waiting for Approval of Loan Items
            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up">
            </em>
            </span>
        </div>
        <!--/.judul--> 

        <!--/table notifikasi loan -->
          <div class="panel-body">
              <table id="infopenghapusan" class="table-data table table-striped table-hover">
              <thead>
                <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>NIK</th>
                <th>Kode Aset</th>
                <th>Nama Aset</th>
                <th>Kegiatan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Jumlah Pemesanan</th>
                <th>Pilih</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                      $result=mysqli_query($connection, "SELECT tbpeminjaman.kodep, tbpeminjaman.NIK,tbpeminjaman.kode_aset,tbaset.nama_aset,tbpeminjaman.kegiatan,tbpeminjaman.tgl_peminjaman,tbpeminjaman.tgl_pengembalian,tbpeminjaman.jumlah_pesanan
                      FROM tbpeminjaman
                      INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset WHERE status='Tersedia' and statuspeminjaman='Menunggu'");
                                
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
                            <td>".$data['kegiatan']."</td>
                            <td>".$data['tgl_peminjaman']."</td>
                            <td>".$data['tgl_pengembalian']."</td>
                            <td>".$data['jumlah_pesanan']."</td>
                            
                            <td>
                                <button class='btn btn-success btn-xs' data-toggle='modal' onclick='openModalForm(".$data['kodep'].",0)'>
                                <i class='glyphicon glyphicon-ok'></i></button>
                                
                                <button class='btn btn-danger btn-xs' data-toggle='modal' onclick='openModalForm(".$data['kodep'].",1)'>
                                <i class='glyphicon glyphicon-remove'></i></button>
                            </td>
                            
                            </tr> 
                            ";
                            $no=$no+1;
                            }
                            ?>
                      </div>
                      </div></div>

                            

<!-- Modal approve loan-->
<div id="modalForm" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4 class="modal-title">Loan Approval</h4>
</div>

    <div class="modal-body">
    <form role="form" action='proses/prosesapprovemanajer.php' autocomplete="off" method="POST" id="reused_form"  enctype="multipart/form-data" onsubmit="return validasi_input(this)">
        <div class="form-group">
          <label for="kodep">Kode Peminjaman*</label>
          <input type="text" id="kodep" name="kodep" value="" class="form-control" readonly>
        </div>

        <div class="form-group">
          <label for="kode_aset">Kode Aset*</label>
          <input type="text" id="kode_aset" name="kode_aset" value="" class="form-control" readonly>
        </div>
                              
        <div class="form-group">
          <label for="statuspeminjaman">Status Peminjaman*</label>
          <select name="statuspeminjaman" class="form-control">
          <option value="pilih" selected>-- Pilih Ya --</option>
          <option value="Ya">Ya</option>       
        </select></div>

        <div class="form-group">
          <label for="keteranganmanajer" >TTD Anda*</label>
          <input  type="file" name="keteranganmanajer">
        </div>
    <!-- Modal Footer loan -->
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button class="btn btn-primary  btn-sm pull-right" name="simpan">KIRIM</button>
    </form>
</div></form></div></div></div></div>
<!-- Tutup Modal approve loan-->                          
                          
                          
<!-- Modal unapprove loan--> 
<div id="modalForm1" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4 class="modal-title">Loan Unapproved</h4>
</div>

    <div class="modal-body">
    <form role="form" action='proses/prosestolakpeminjaman.php' autocomplete="off" method="POST" id="reused_form"  enctype="multipart/form-data" onsubmit="return validasi_inputUNLOAN(this)">

      <div class="form-group">
        <label for="kodep">Kode Peminjaman*</label>
        <input type="text" id="kodep" name="kodep" value="" class="form-control" readonly>
      </div>

      <div class="form-group">
        <label for="kode_aset">Kode Aset*</label>
        <input type="text" id="kode_aset" name="kode_aset" value="" class="form-control" readonly>
      </div>
                              

      <div class="form-group">
        <label for="statuspeminjaman">Status Peminjaman*</label>
        <select name="statuspeminjaman" class="form-control">
        <option value="pilih" selected>-- Pilih Tidak --</option>
        <option value="Tidak">Tidak</option>       
      </select></div>

      <div class="form-group">
        <label for="keterangan">Keterangan*</label>
        <select name="keterangan" class="form-control">
        <option value="pilih" selected>-- Pilih Tidak di Setujui --</option>
        <option value="Tidak di Setujui">Tidak di Setujui</option>       
      </select>

      <div class="form-group">
        <label for="keteranganmanajer">Keterangan/Alasan</label>
        <input type="text" class="form-control" id="keteranganmanajer" name="keteranganmanajer" placeholder="Masukkan Alasan Anda" minlength="5" maxlength="50" />
      </div>
    </div></div>
      
    <!-- Modal Footer -->
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button class="btn btn-primary  btn-sm pull-right" name="simpan">KIRIM</button>
    </form>
</div>

</tbody>
</table> 
</span> 
catatan :
<br>
1. Silahkan Pilih Salah Satu Button Untuk Persetujuan <BR>
2. Bubuhkan atau Upload Tanda Tangan Anda Jika Memilih Button Ceklis <BR>
3. Beri Keterangan atau Alasan Jika Memilih Button X
</div>
</div>

<!-- Tutup Modal unapprove loan--> 
   
<br>
        
       
<!--waiting procurement-->    
  <!-- judul table -->    
  <div class="panel panel-default">
  <div class="panel-heading">
  Waiting for Approval of Procurement Items
  <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em>
  </span>
  </div>
  <!-- .judul table -->                   
                    
  <!-- Tampilan table waiting procure-->
  <div class="panel-body">
  <table id="infopenghapusan" class="table-data table table-striped table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Pengajuan</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Nama Barang</th>
      <th>Kelompok</th>
      <th>Posisi</th>
      <th>Tujuan</th>
      <th>Jumlah</th>
      <th>Perkiraan Harga</th>
      <th>Tgl Pengajuan</th>
      <th>Pilih</th>
    </tr>
  </thead>
    <tbody>
      <?php
        $result=mysqli_query($connection, "SELECT tbpengadaan.koder, tbpengadaan.NIK, tbpengadaan.nama_aset, tbpengadaan.kelompok_aset, tbpengadaan.posisi, tbpengadaan.tujuan, tbpengadaan.stock1, tbpengadaan.harga, tbpengadaan.tgl_pengajuan, tbuser.nama_user 
        FROM tbpengadaan
        INNER JOIN tbuser ON tbuser.NIK=tbpengadaan.NIK
        WHERE  status = ''");
        $no=1;
        while ($data = mysqli_fetch_array($result))
        {
          echo "    
            <tr>
              <td>".$no."</td>
              <td>".$data['koder']."</td>
              <td>".$data['NIK']."</td>
              <td>".$data['nama_user']."</td>
              <td>".$data['nama_aset']."</td>
              <td>".$data['kelompok_aset']."</td>
              <td>".$data['posisi']."</td> 
              <td>".$data['tujuan']."</td>
              <td>".$data['stock1']."</td>
              <td>".$data['harga']."</td>
              <td>".$data['tgl_pengajuan']."</td>

              <td>
                                <button class='btn btn-success btn-xs' data-toggle='modal' onclick='openModalFormprocure(".$data['koder'].",2)'>
                                <i class='glyphicon glyphicon-ok'></i></button>
                                
                                <button class='btn btn-danger btn-xs' data-toggle='modal' onclick='openModalFormprocure(".$data['koder'].",3)'>
                                <i class='glyphicon glyphicon-remove'></i></button>
                            </td>
                            
                            </tr> 
                            ";
                            $no=$no+1;
                            }
                            ?>
                      </div>
                      </div></div>


<!-- Modal approve procurement-->
<div id="modalForm2" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4 class="modal-title">Approved Procurement</h4>
</div>

    <!-- Modal form approve procurement-->
    <div class="modal-body">
    <form role="form" action='proses/prosesaccmanajer.php' autocomplete="off" method="POST" id="reused_form" enctype="multipart/form-data" onsubmit="return validasi_inputreq(this)">

      <div class="form-group">
        <label for="koder">Kode Pengadaan*</label>
        <input type="text" id="koder" name="koder" value="" class="form-control" readonly>
      </div>

      <div class="form-group">
        <label for="nama_aset">Nama Aset*</label>
        <input type="text" id="nama_aset" name="nama_aset" value="" class="form-control" readonly>
      </div>

      <div class="form-group">
        <label for="tujuan">Tujuan Pembelian*</label>
        <input type="text" id="tujuan" name="tujuan" value="" class="form-control" readonly>
      </div>
                              
      <div class="form-group">
        <label for="status">Status*</label>
        <select name="status" class="form-control">
        <option value="pilih" selected>-- Pilih Ya --</option>
        <option value="Ya">Ya</option>       
      </select></div>

      <div class="form-group">
        <label for="keterangan" >TTD Anda*</label>
        <input  type="file" name="keterangan">
      </div>
    
    <!-- Modal Footer -->
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button class="btn btn-primary  btn-sm pull-right" name="simpan">KIRIM</button>

    </form>
</div></form></div></div></div></div>
    <!-- tutup Modal form approve procurement-->
                           
                          
                          

<!-- modal unapproved procurement -->
<div id="modalForm3" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4 class="modal-title">Unapproved Procurement</h4>
</div>

  <!-- modal unapproved form procurement -->
  <div class="modal-body">
  <form role="form" action='proses/prosestolakpengajuan.php' autocomplete="off" method="POST" id="reused_form" enctype="multipart/form-data" onsubmit="return validasi_inputreq(this)">

    <div class="form-group">
      <label for="koder">Kode Pengajuan*</label>
      <input type="text" id="koder" name="koder" value="" class="form-control" readonly>
    </div>

    <div class="form-group">
      <label for="nama_aset">Nama Aset*</label>
      <input type="text" id="nama_aset" name="nama_aset" value="" class="form-control" readonly>
    </div>
                              
    <div class="form-group">
      <label for="tujuan">Tujuan Pembelian*</label>
      <input type="text" id="tujuan" name="tujuan" value="" class="form-control" readonly>
    </div>

    <div class="form-group">
      <label for="status">Status*</label>
      <select name="status" class="form-control">
      <option value="pilih" selected>-- Pilih Tidak --</option>
      <option value="Tidak">Tidak</option>       
    </select></div>


    <div class="form-group">
      <label for="keterangan">Keterangan/Alasan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Alasan Anda" minlength="5" maxlength="50" />
    </div>

    <!-- Modal Footer -->
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button class="btn btn-primary  btn-sm pull-right" name="simpan">KIRIM</button>
                            
  </form>
  </div>
                            
</tbody>
</table> 
</span> 
catatan :
<br>
1. Silahkan Pilih Salah Satu Button Untuk Persetujuan <BR>
2. Bubuhkan atau Upload Tanda Tangan Anda Jika Memilih Button Ceklis <BR>
3. Beri Keterangan atau Alasan Jika Memilih Button X
</div>
</div>
<!--Tutup modal unapproved procure-->
            

  <br>      

</div>
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


       <script>
    function openModalForm(id,idmodal){
      var elm;
      switch(idmodal){
        case 0 : elm = $('#modalForm');break; 
        case 1 : elm = $('#modalForm1');break;
    }
      $.ajax({
        url : "data_modal.php?kodep="+id,
        success : function(jsonData){
        jsonData = JSON.parse(jsonData);
        elm.find('#kodep').val(jsonData.kodep);
        elm.find('#kode_aset').val(jsonData.kode_aset);
        elm.modal('show');
        }
      });
    }
    </script>

        <script>
  

    function openModalFormprocure(idprocure,idmodalprocure){
      var elmemnt;
      switch(idmodalprocure){
        case 2 : elmemnt = $('#modalForm2');break; 
        case 3 : elmemnt = $('#modalForm3');break;
    }
      $.ajax({
        url : "datamodal1.php?koder="+idprocure,
        success : function(jsonData){
        jsonData = JSON.parse(jsonData);
        elmemnt.find('#koder').val(jsonData.koder);
        elmemnt.find('#nama_aset').val(jsonData.nama_aset);
        elmemnt.find('#tujuan').val(jsonData.tujuan);
        elmemnt.modal('show');
        }
      });
    }
    </script>

     <script type="text/javascript">
  
    function cetakpdf(){

      var tgl_a = $('#tgl_a').val();
      var tgl_b = $('#tgl_b').val();

      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/cetakpeminjaman.php?tgl_a="+tgl_a+"&tgl_b="+tgl_b;

      window.open(urlcetak,'_self');
    }

</script>

 <script type="text/javascript">
  
    function cetakpdf1(){

      var tgl_c = $('#tgl_c').val();
      var tgl_d = $('#tgl_d').val();

      base_url = window.location.host;
      var urlcetak = "/aset_peminjaman/cetaktolakpeminjaman.php?tgl_c="+tgl_c+"&tgl_d="+tgl_d;

      window.open(urlcetak,'_self');
    }

</script>
     
</body>
</html>
            
