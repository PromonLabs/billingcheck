
<?php
  $file = '/home/nocuser/platforms/checkdir/gprs_hour02/gprs_hour02.pdf';
  $filename = 'gprs_hour02.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





