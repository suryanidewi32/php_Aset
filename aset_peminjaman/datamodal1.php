<?php

$koder = $_GET['koder'];

include('connection.php');

    $con = mysqli_connect("localhost","root","","dbasetpeminjaman");
	$result=mysqli_query($connection, "SELECT *
                      FROM tbpengadaan
                      WHERE  koder = '$koder' ");



	while($res = mysqli_fetch_assoc($result)){
		echo json_encode($res);
	}

?>
