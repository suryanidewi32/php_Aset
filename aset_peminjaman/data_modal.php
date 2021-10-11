<?php

$kodep = $_GET['kodep'];

include('connection.php');

    $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
	$result=mysqli_query($connection, "SELECT * FROM tbpeminjaman WHERE kodep = '$kodep' ");



	while($res = mysqli_fetch_assoc($result)){
		echo json_encode($res);
	}

?>
