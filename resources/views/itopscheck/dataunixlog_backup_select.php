<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<h3>DATA UNIX RESTORE CHECK LOG:SELECT DATA<h3></h1>

<a href="/">HOME</a>
<a href="itopscheck.html">BACK</a>
<a href="dataunixlog_delete.php">DELETE DATA</a>
<a href="dataunixlog_insert.php">INSERT DATA</a>
<a href="dataunixlog_update.php">UPDATE DATA</a>


<h5 align="center" >
<form action="dataunixlog_backup_select.php" method="post">
<?php
echo $_SERVER['REMOTE_USER'] ; 
 print(" is authorized to use this feature ");

?>
<br>
<br>


SELECT *  FROM DATAUNIXLOG WHERE CHECKTYPE = 
<select name="kol">
  <option value=""></option>
  <option value="checktype">restorecheck</option>
</select><br />



<input type="submit" name="submit">
</form>
</h5>

<?php
if($_POST['submit']) {



error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");


// let me know if the connection fails
if (!$connection) {
    print("Connection Failed.");
    exit;
}


if($_POST['kol']) {
  $myresult = pg_query($connection, "
  SELECT *  FROM serveradm.dataunixlog 
  where  $_POST[kol]  like 'restorecheck'
  order by  6; ");
}
else {
  $myresult = pg_query($connection, "
SELECT *  FROM serveradm.dataunixlog where checktype = 'restorecheck' order by 6 desc limit 20; "); } 

echo pg_last_error($connection);


echo "<table border='1'>
<tr>
<th>logid</th>
<th>dokuwiki</th>
<th>tech</th>
<th>checktype</th>
<th>checkstatus</th>
<th>remarks</th>
<th>inserttime</th>
</tr>";


while ($row = pg_fetch_array($myresult)) {
 $logid = $row['logid'];
 $servername = $row['servername'];
 echo "<tr>";
  echo "<td>" . $row[0] .  "</td>";
  echo "<td><a href='http://wiki.srv.gl/dokuwiki/doku.php?id=data_unix:restorelog:$logid'>Dokuwiki</a></td>";
  echo "<td>" . $row[1] .  "</td>";
  echo "<td>" . " $row[2]  " .  "</td>";
  echo "<td>" . " $row[3]  " .  "</td>";
  echo "<td>" . " $row[4]  " .  "</td>";
  echo "<td>" . " $row[5]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}

?>

</body>
</html> 




