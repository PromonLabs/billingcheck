<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>ERRORLOG:UPDATE DATA<h3></h1>

<a href="/">HOME</a>
<br>
<a href="itopscheck.html">BACK</a>
<a href="error_log_select.php">SELECT DATA</a>
<a href="error_log_insert.php">INSERT DATA</a>
<a href="error_log_delete.php">DELETE DATA</a>


<h5 align="center" >
<form action="error_log_update.php" method="post">
&nbsp;

<?php
echo $_SERVER['REMOTE_USER'];

if ($_SERVER['REMOTE_USER'] == "hapi"  || $_SERVER['REMOTE_USER'] == "kij" || $_SERVER['REMOTE_USER'] == "perr" || $_SERVER['REMOTE_USER'] == "las" ) {

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



UPDATE ERRORLOG SET   
<select name="kol">
  <option value=""></option>
  <option value="created_by">tech</option>
  <option value="inserttime">inserttime</option>
  <option value="remarks">description</option>
  <option value="errortype">errortype</option>
</select><br />

<textarea  rows="4" cols="50" name="eq">.</textarea><br>

WHERE ERRORID =  <input type="text" name="error_id"><br>

<input type="submit" name="search">
</form>
</h5>


<?php
if($_POST['error_id']) {

error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");


// let me know if the connection fails
if (!$connection) {
    print("Connection Failed.");
    exit;
}

$eq = pg_escape_literal(trim($_POST['eq']));

echo $serverid;

$myresult = pg_query($connection,
 "UPDATE serveradm.error_log SET $_POST[kol]={$eq}  WHERE  error_id=$_POST[error_id]; "); 

 $myresult = pg_query($connection, "
  SELECT *  FROM serveradm.error_log 
  where  error_id =  $_POST[error_id] "); 

echo pg_last_error($connection);

echo "<table border='1'>
<tr>
<th>error_id</th>
<th>created_by</th>
<th>inserttime</th>
<th>description</th>
<th>completed</th>
<th>completed_by</th>
<th>errortype</th>
</tr>";

while ($row = pg_fetch_row($myresult)) {
 echo "<tr>";
  echo "<td>" . " $row[0]  " .  "</td>";
  echo "<td>" . " $row[1]  " .  "</td>";
  echo "<td>" . " $row[2]  " .  "</td>";
  echo "<td>" . " $row[3]  " .  "</td>";
  echo "<td>" . " $row[5]  " .  "</td>";
  echo "<td>" . " $row[6]  " .  "</td>";
  echo "<td>" . " $row[4]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}


?>

</body>
</html> 


<?php

print("-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
?>




<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<br>
<br>
<br>
<h3>ERRORLOG:UPDATE "COMPLETED"<h3></h1>

<h5 align="center" >
<form action="error_log_update.php" method="post">
&nbsp;

ERRORID =  <input type="text" name="xerror_id"><br>

<input type="submit" name="search">
</form>
</h5>


<?php
if($_POST['xerror_id']) {

error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");


// let me know if the connection fails
if (!$connection) {
    print("Connection Failed.");
    exit;
}

$eq = pg_escape_literal(trim($_POST['eq']));
$user = pg_escape_literal($_SERVER['REMOTE_USER']);

echo $serverid;

$myresult = pg_query($connection,
 "UPDATE serveradm.error_log SET (caseclosed,completed_by)= (to_char(CURRENT_TIMESTAMP,'yyyy-mm-dd:hh24'),{$user})  WHERE  error_id=$_POST[xerror_id]; ");

 $myresult = pg_query($connection, "
  SELECT *  FROM serveradm.error_log 
  where  error_id =  $_POST[xerror_id] ");

echo pg_last_error($connection);

echo "<table border='1'>
<tr>
<th>error_id</th>
<th>tech</th>
<th>inserttime</th>
<th>description</th>
<th>completed</th>
<th>completed_by</th>
<th>errortype</th>
</tr>";

while ($row = pg_fetch_row($myresult)) {
 echo "<tr>";
  echo "<td>" . " $row[0]  " .  "</td>";
  echo "<td>" . " $row[1]  " .  "</td>";
  echo "<td>" . " $row[2]  " .  "</td>";
  echo "<td>" . " $row[3]  " .  "</td>";
  echo "<td>" . " $row[4]  " .  "</td>";
  echo "<td>" . " $row[6]  " .  "</td>";
  echo "<td>" . " $row[5]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}


?>

</body>
</html> 

