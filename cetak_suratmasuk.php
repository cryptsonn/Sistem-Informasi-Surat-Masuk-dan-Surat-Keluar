<?php
include("koneksi.php");
$query = mysqli_query($db, "SELECT file_surat FROM `surat_masuk`
WHERE surat_masuk.file_surat");
$file ='./upload/'.$_GET['file_surat'];
$fp = fopen($file, "r") ;

header("Cache-Control: maxage=1");
header("Pragma: public");
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=".$file."");
header("Content-Description: PHP Generated Data");
header("Content-Transfer-Encoding: binary");
header('Content-Length:' . filesize($file));
ob_clean();
flush();
while (!feof($fp)) {
   $buff = fread($fp, 1024);
   print $buff;
}
exit;
?>
