
<?php
  $file = '/home/nocuser/public_html/pdfdir/E2Ebilling05.pdf';
  $filename = 'E2Ebilling05.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





