<?php

//load.php

 $con = mysqli_connect("localhost","root","","dbasetpeminjaman");

$data = array();

$query = "SELECT * FROM tbpeminjaman ORDER BY kodep WHERE statuspeminjaman='approve'";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'kodep'   => $row["kodep"],
  'kegiatan'   => $row["kegiatan"],
  'tgl_peminjaman'   => $row["tgl_peminjaman"],
  'tgl_pengembalian'   => $row["tgl_pengembalian"]
 );
}

echo json_encode($data);

?>

