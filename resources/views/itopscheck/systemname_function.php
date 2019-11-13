<?php

function dropsystemnames($input)
{



  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");
if (!$connection) {
    print("Connection Failed.");
    exit;
}
    $myresult = pg_query($connection, "
  SELECT navn FROM serveradm.systemnavne;; ");
  
  if (!$myresult) {
  echo "An error occurred : \n";
  echo "<br>";
  echo pg_last_error($connection);
  echo "<br>";
  echo pg_result_error ($connection);
  exit;
  
}

?>
 <select name= "<?=$input; ?>">
 <option value=""></option>
<?php

      
  while ($data = pg_fetch_object($myresult)) {


?>
   <option value="<?=$data->navn; ?>"><?=$data->navn; ?></option>
<?php
    }

?>
 </select>
<?php
    
	
}
?>


