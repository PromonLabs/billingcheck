
<?php
  $file = '/home/nocuser/platforms/checkdir/stat_12/stat_12.pdf';
  $filename = 'stat_12.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





