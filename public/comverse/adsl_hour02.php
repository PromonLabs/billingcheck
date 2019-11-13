
<?php
  $file = '/home/nocuser/platforms/checkdir/adsl_hour02/adsl_hour02.pdf';
  $filename = 'adsl_hour02.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





