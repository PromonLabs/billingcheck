
<?php
  $file = '/home/nocuser/public_html/pdfdir/billingcheck.pdf';
  $filename = 'billingcheck.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





