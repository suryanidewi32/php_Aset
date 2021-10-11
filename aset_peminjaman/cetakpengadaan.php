<?php ob_start(); ?>

<?php include "cetaklaporanpengadaan.php"; ?>

<?php

$html = ob_get_contents();
        ob_end_clean();
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L','A3','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Pengajuan Aset.pdf', 'D');
?>

<?php

?>