
<?php
  $file = '/home/nocuser/platforms/checkdir/lte_hour02/lte_hour02.pdf';
  $filename = 'lte_hour02.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





