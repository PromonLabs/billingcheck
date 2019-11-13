<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>DATA_UNIX CHECK SYSTEM LOG:INSERT DATA <h3></h1>
<h3><time><?php echo date('l jS \of F Y h:i:s A'); ?></time></h3>
<a href="/">HOME</a> 
<a href="itopscheck.html">BACK</a>
<a href="checklog_select.php">SELECT DATA</a>
<a href="checklog_update.php">UPDATE DATA</a>
<a href="checklog_delete.php">DELETE DATA</a><br><br>

<h5 align="center" >
<form action="checklog_insert.php" method="post">


&nbsp;

<?php
echo $_SERVER['REMOTE_USER'];

if ($_SERVER['REMOTE_USER'] == "hapi"  || $_SERVER['REMOTE_USER'] == "kij"  || 
$_SERVER['REMOTE_USER'] == "perr"  || $_SERVER['REMOTE_USER'] == "las" || $_SERVER['REMOTE_USER'] == "emk" ||  $_SERVER['REMOTE_USER'] == "comv") {

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

SERVER
<select name="servername">
 <option value=""></option>
  <option value="rdbnuk13">rdbnuk13</option>
  <option value="ndbnuk10">ndbnuk10</option>
  <option value="ndbnuk9">ndbnuk9</option>
</select><br />


LOGFILE
<select name="logfile">
 <option value=""></option>
  <option value="message">message</option>
  <option value="syslog">syslog</option>
  <option value="last">last</option>
</select><br />

CHECKSTATUS
<select name="checkstatus">
 <option value=""></option>
  <option value="ok">ok</option>
  <option value="error">error</option>
  <option value="info">info</option>
</select><br />

REMARKS : <textarea  rows="4" cols="50" name="remarks">.</textarea><br>

<input type="submit" name="search">
</form>
</h5>

<?php


if($_POST['servername']) {

error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");
if (!$connection) {
    print("Connection Failed.");
    exit;
}

$tech1 = pg_escape_literal($_SERVER['REMOTE_USER']);
$servername = pg_escape_literal(trim($_POST['servername']));
$logfile = pg_escape_literal(trim($_POST['logfile']));
$checkstatus = pg_escape_literal(trim($_POST['checkstatus']));
$remarks = pg_escape_literal(trim($_POST['remarks']));


$myresult = pg_query($connection,
 "INSERT INTO serveradm.checklog(tech, servername, logfile, remarks, inserttime,checkstatus)
  VALUES ({$tech1},{$servername},{$logfile},{$remarks},to_char(CURRENT_TIMESTAMP,'yyyy-mm-dd hh24:mi'),{$checkstatus}); ");

if (!$myresult) {
  echo "An error occurred : \n";
  echo "<br>";
  echo pg_last_error($connection);
  echo "<br>";
  echo pg_result_error ($connection);
  exit;
  
}


$notice = pg_last_notice($connection);
  
  echo $notice;


$myresult = pg_query($connection, "
  SELECT *  FROM serveradm.checklog 
  order by 1 desc limit 1 ");

if (!$myresult) {
  echo "An error occurred : \n";
  echo "<br>";
  echo pg_last_error($connection);
  echo "<br>";
  echo pg_result_error ($connection);
  exit;
  
}

echo "<table border='1'>
<tr>
<th>logid</th>
<th>tech</th>
<th>servername</th>
<th>logfile</th>
<th>remarks</th>
<th>inserttime</th>
<th>checkstatus</th>
</tr>";

while ($row = pg_fetch_row($myresult)) {
 echo "<tr>";
  echo "<td>" . " $row[0]  " .  "</td>";
  echo "<td>" . " $row[1]  " .  "</td>";
  echo "<td>" . " $row[2]  " .  "</td>";
  echo "<td>" . " $row[3]  " .  "</td>";
  echo "<td>" . " $row[4]  " .  "</td>";
  echo "<td>" . " $row[5]  " .  "</td>";
  echo "<td>" . " $row[6]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}

else
{
print "Indtast servername ";
}
?>

</body>
</html> 


