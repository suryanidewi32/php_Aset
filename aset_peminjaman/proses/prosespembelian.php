<?php
	$link=mysqli_connect("localhost","root","","dbasetpeminjaman");
		$koder = $_GET['koder'];

		$query="UPDATE tbpengadaan SET statusbarang = 'beli' WHERE koder='$koder'";
		mysqli_query($link, $query);
		
		
	
	header("location:../halperlengkapan.php");
?>