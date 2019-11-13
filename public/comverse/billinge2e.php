
<?php
  $file = '/home/nocuser/public_html/pdfdir/com_emm_billingcheck.pdf';
  $filename = 'com_emm_billingcheck.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





