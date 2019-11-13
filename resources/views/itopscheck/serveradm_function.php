<?php

function dropinit($input)
{



  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");
if (!$connection) {
    print("Connection Failed.");
    exit;
}
    $myresult = pg_query($connection, "
  SELECT init  FROM serveradm.initialer order by 1; ");
  
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
   <option value="<?=$data->init; ?>"><?=$data->init; ?></option>
<?php
    }

?>
 </select>
<?php
    
	
}
?>


