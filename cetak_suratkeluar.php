<?php
include("koneksi.php");
$query = mysqli_query($db, "SELECT file_suratk FROM `surat_keluar`
WHERE surat_keluar.file_suratk");
$file ='./upload/'.$_GET['file_suratk'];
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
