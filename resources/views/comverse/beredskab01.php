
<?php
  $file = '/home/nocuser/public_html/pdfdir/e2ebilling02_06022015.pdf';
  $filename = 'e2ebilling02_06022015.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





