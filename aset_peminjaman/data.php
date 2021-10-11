<?php
require_once("prosesjadwal.php");
$p=new Mysqlminang("dbasetpeminjaman","localhost","root","");
$sql="Select * from tbpeminjaman";
$data=array();
foreach($p->GetAllRows($sql) as $row)
{
	$data[]=array(
				'title'=>$row->kegiatan,
				'start'=>$row->tgl_peminjaman,
				'end'=>$row->tgl_pengembalian,
				);
}
	echo json_encode($data);
?>
