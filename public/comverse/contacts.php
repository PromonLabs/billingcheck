
<?php
  $file = '/home/nocuser/public_html/pdfdir/billingcheck_contacts.pdf';
  $filename = 'billingcheck_contacts.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





