<?php
	$link=mysqli_connect("localhost","root","","dbasetpeminjaman");
		$kode_aset = $_GET['kode_aset'];
		$query="DELETE from tbaset where kode_aset='$kode_aset'";
		mysqli_query($link, $query);
		
		
	
	header("location:../fixedasset.php");
?>