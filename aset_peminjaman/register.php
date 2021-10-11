<?php
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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

    <script type="text/javascript">
      function validasi_input(form){
        pola_password=/^[a-zA-Z0-9\_\-]{6,100}$/;
      if (form.NIK.value != ""){
        var x = (form.NIK.value);
      var mincar = 8;
        var status = true;
        var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        for (i=0; i<=x.length-1; i++)
        {
        if (x[i] in list) cek = true;
        else cek = false;
        status = status && cek;
      }
      if (status == false) {

          alert("NIK Harus Angka!");
          form.NIK.focus();
          return (false);
        
      }
    }
     if (form.NIK.value == ""){
          alert("NIK harus diisi!");
          form.NIK.focus();
          return (false);
        

        }

         if (form.nama_user.value == ""){
          alert("Nama harus diisi!");
          form.nama_user.focus();
          return (false);
        

        }

         if (form.jabatan.value == ""){
          alert("Jabatan harus diisi!");
          form.jabatan.focus();
          return (false);
        }
      
      if (form.bagian.value == ""){
          alert("Bagian harus diisi!");
          form.bagian.focus();
          return (false);
        }

      if (form.username.value == ""){
          alert("Username harus diisi!");
          form.username.focus();
          return (false);
        }
        
      if (form.username.value.length < mincar){
          alert("Panjang Username Minimal 8 Karakter!");
          form.username.focus();
          return (false);
        }

        if (form.password.value == ""){
          alert("Password harus diisi!");
          form.password.focus();
          return (false);
        }

	  if (!pola_password.test(form.password.value)){
          alert("Password Minimal 6 Karakter dan Hanya Boleh Huruf atau Angka!");
          form.password.focus();
          return (false);
        }


      if (form.level.value == "pilih"){
          alert("Status harus diisi!");
          form.level.focus();
          return (false);
        }
        return (true);
        }
  </script>

  <script>
    function hanyaAngka(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode<48 || charCode >57))
        return false;
      return true;
    }
  </script>

    <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip(); 
      });
    </script>


</head>

<body>
	<div class="row">
			
		
		<!-- form kendaraan -->
		<div class="row">
			 <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            
                       
                            <div class="panel panel-default">
                               
                                <div class="panel-heading" align="center">  
                                  <a href="http://rizhuljanuar.com/aset_peminjaman/index.php">
                                    <button class="btn btn-default "> <i class ="fa fa-arrow-left btn-default"></i>
                                      </button></a> Registrasi</div>
                                <div class="panel-body">

    						
                                <form  action='proses/prosesregistrasi.php' method='POST' enctype="multipart/form-data" autocomplete="off" onsubmit="return validasi_input(this)" class="login-form">
                                    <fieldset>

                                      <div class="form-group">
                        <label class="sr-only" for="NIK">Masukkan NIK</label>
                                    <input type="text" id="NIK" name="NIK" placeholder="Masukkan NIK" class="form-control" autofocus="" onkeypress="return hanyaAngka(event)" minlength="20" maxlength="20">
                                    </div>


                                    <div class="form-group">
          					 		<label class="sr-only" for="nama_user">Masukkan Nama</label>
                                    <input type="text" id="nama_user" name="nama_user" placeholder="Masukkan Nama" class="form-control" minlength="1" maxlength="50">
                                    </div>


                                    <div class="form-group">
          							<label class="sr-only" for="jabatan">Masukkan Jabatan Anda</label>
                                    <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Anda" class="form-control" minlength="1" maxlength="30">
                                    </div>

									<div class="form-group">
          							<label class="sr-only" for="bagian">Masukkan Bagian Anda</label>
                                    <input type="text" name="bagian" placeholder="Masukkan Bagian Anda" class="form-control" id="bagian" minlength="1" maxlength="30">
                                    </div>

                                
          							<div class="form-group">
									<label class="sr-only" for="username">Masukkan Username</label>
                                    <input type="text" name="username" placeholder="Masukkan Username" class="form-control" id="username" minlength="1" maxlength="20">
                                    </div>

                                    <div class="form-group">
                                    <label class="sr-only" for="password">Masukkan Password</label>
                                    <input type="password" name="password" placeholder="Masukkan Password" class="form-control" id="password" minlength="1" maxlength="10">
                                    </div>

                                    <div class="form-group">
									<label class="sr-only" for="level">Status</label>
									<select name="level" class="form-control">
									<option value="pilih" selected>-- Pilih Karyawan--</option>
            						<option value="Karyawan">Karyawan</option>
                        	</select>
			
									</div></div>
         
            			 			<button class="btn btn-primary form-control" name="simpan">Registrasi</button> 
                        <br>

</div>
          </div>  
							</fieldset>
						</form>


					</div>
				</div>
			</div>
    

<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
