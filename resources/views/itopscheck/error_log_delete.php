<html>
<body>
<h3>ERRORLOG:DELETE DATA<h3></h1>

<a href="/">HOME</a>  
<a href="itopscheck.html">BACK</a>
<a href="error_log_select.php">SELECT DATA</a>
<a href="error_log_insert.php">INSERT DATA</a>
<a href="error_log_update.php">UPDATE DATA</a>



<h5 align="center" >
<form action="error_log_delete.php" method="post">
&nbsp;

<?php
echo $_SERVER['REMOTE_USER'];

if ($_SERVER['REMOTE_USER'] == "hapi"  || $_SERVER['REMOTE_USER'] == "kij"  || $_SERVER['REMOTE_USER'] == "perr"  || $_SERVER['REMOTE_USER'] == "las") {

  print("  is authorized to use this feature ");
}
else
{
  print(" is not authorized to use this feature, incident will be reported ");
exit;
}

?>
<br>
<br>






DELETE FROM ERRORLOG WHERE LOGID = <input type="text" name="name"><br>
<input type="submit" name="search">
</form>
</h5>


<?php
if($_POST['name']) {

#error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");


// let me know if the connection fails
if (!$connection) {
    print("Connection Failed.");
    exit;
}


$myresult = pg_query($connection,
 "DELETE FROM serveradm.error_log  WHERE error_id='$_POST[name]'; "); 

echo pg_last_error($connection);
echo pg_last_notice($pgsql_conn);
  
  


}


?>

</body>
</html> 




