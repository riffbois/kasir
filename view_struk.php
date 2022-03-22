<?php
require_once 'library/dompdf/autoload.inc.php';

$id_trx = $_GET['idtrx'];

//reference the dompdf namespace
use Dompdf\Dompdf;


$dompdf = new Dompdf();
ob_start();
require 'transaksi_selesai_pdf.php';
$struk = ob_get_clean();
ob_end_clean();
$dompdf->loadHtml($struk);


$dompdf->setPaper('A4', 'portrait');


$dompdf->render();

$dompdf->stream('struk' .$trx['nomor'].'.pdf',["Attachment"=>false]);
exit(0);