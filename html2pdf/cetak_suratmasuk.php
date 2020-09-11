<?php
$content = "
<page>
<h1>exemple d'utilisation</h1>
<br>
Ceci est un<b>exemple d'utilisation</b>
de <a href='http://html2pdf.fe/'>HTML2PDF</a>.<br>
</page>";

require_once('html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHtml($content);
$html2pdf->Output('exemple.pdf');
?>
