<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<h3>INSERT ERRORLOG<h3></h1>



<h5 align="center" >
<form action="error_log_ack.php" method="post">
<?php
echo $_SERVER['REMOTE_USER'] ; 
 print(" is authorized to use this feature ");

?>
<br>
<br>


</form>
</h5>

<?php



error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");


// let me know if the connection fails
if (!$connection) {
    print("Connection Failed.");
    exit;
}


  $myresult = pg_query($connection, "
SELECT *  FROM serveradm.error_log order by 1 desc limit 5");  

echo pg_last_error($connection);


echo "<table border='1'>
<tr>
<th>logid</th>
<th>tech</th>
<th>creation time</th>
<th>remarks</th>
<th>alarmtype</th>
<th>completed</th>
<th>wiki</th>
</tr>";


while ($row = pg_fetch_array($myresult)) {
 $serverid = $row['serverid'];
 $servername = $row['servername'];
 echo "<tr>";
  echo "<td>" . $row[0] .  "</td>";
  echo "<td>" . $row[1] .  "</td>";
  echo "<td>" . " $row[2]  " .  "</td>";
  echo "<td>" . " $row[3]  " .  "</td>";
  echo "<td>" . " $row[5]  " .  "</td>";
  echo "<td>" . " $row[4]  " .  "</td>";
 echo "<td><a href='http://wiki.srv.gl/dokuwiki/doku.php?id=billingcheck_log:$row[0]'>Dokuwiki</a></td>";
 echo "</tr>";
}

echo "</table>";



?>

<br>
<br>

BACK TO INSERT

<form action="error_log_ack.php" method="post">
<input type="submit" name="search">
</form>
</h5>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
header("Location:http://billingcheck.srv.gl/itopscheck/error_log_insert.php");
}
?>




</body>
</html> 




