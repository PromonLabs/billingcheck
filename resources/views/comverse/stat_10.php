
<?php
  $file = '/home/nocuser/platforms/checkdir/stat_10/stat_10.pdf';
  $filename = 'stat_10.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





