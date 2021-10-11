<?php
session_start(); 
if($_SESSION){
    if($_SESSION['level']=="Petugas_Keuangan")
    {
        header("Location: halakun.php");
    }
    if($_SESSION['level']=="Petugas_Barang")
    {
        header("Location: halperlengkapan.php");
    }
    if($_SESSION['level']=="Karyawan")
    {
        header("Location: halpeminjam.php");
    }
    if($_SESSION['level']=="Manajer_Keuangan")
    {
        header("Location: halmanajerakun.php");
    }
    if($_SESSION['level']=="Manajer_BagUmum")
    {
        header("Location: halmanajerumum.php");
    }
}

include('login.php'); 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
 <!-- Top content -->
     
                    <div class="row">
                       <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            
                         <div class="form-top">
                            <div class="login-panel panel panel-default">
                

                                <div class="panel-heading">Log in</div>
                                <div class="panel-body">

    
                                
                        
                           

                            <div class="form-bottom">
                                
                                <form role="form" action="" method="post" class="login-form">
                                    <fieldset>

                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Username" class="form-username form-control" id="form-username" autofocus="">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password">
                                    </div>
                                    <div class="checkbox">
                                
<label>
                                    
<input name="remember" type="checkbox" value="Remember Me">Remember Me
                                
</label>
                            
</div>
    
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                    <?php echo $error; ?>
                                    <p align="center">
                       Belum Punya Akun? <a href="register.php">Registrasi</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
