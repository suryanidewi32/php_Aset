<?php

require_once("jadwal.php");


$p=new dbasetpeminjaman("localhost","root","","dbasetpeminjaman");

$sql="SELECT tbuser.nama_user, tbaset.nama_aset, tbpeminjaman.kegiatan, tbpeminjaman.tgl_peminjaman, tbpeminjaman.tgl_pengembalian
                FROM tbpeminjaman
                INNER JOIN tbuser ON tbuser.NIK = tbpeminjaman.NIK 
                INNER JOIN tbaset ON tbaset.kode_aset = tbpeminjaman.kode_aset 
                WHERE statuspeminjaman = 'approve'
";

$data=array();

foreach($p->GetAllRows($sql) as $row)

{

 $data[]=array(

    'title'=>$row->judul,

    'start'=>$row->tgl1,

    'end'=>$row->tgl2,

    );

}

 echo json_encode($data);

?>