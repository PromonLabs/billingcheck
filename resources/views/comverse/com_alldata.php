
<?php
  $file = '/home/nocuser/platforms/com_data/pdfdoks/com_alldata.pdf';
  $filename = 'com_alldata.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>





