<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<h3>DATA UNIX CHECK SYSTEM LOG:SELECT DATA<h3></h1>

<a href="/">HOME</a>
<a href="itopscheck.html">BACK</a>
<a href="checklog_delete.php">DELETE DATA</a>
<a href="checklog_insert.php">INSERT DATA</a>
<a href="checklog_update.php">UPDATE DATA</a>


<h5 align="center" >
<form action="checklog_select.php" method="post">
<?php
echo $_SERVER['REMOTE_USER'] ; 
 print(" is authorized to use this feature ");

?>
<br>
<br>


SELECT *  FROM DATAUNIXLOG WHERE  
<select name="kol">
  <option value=""></option>
  <option value="to_char(logid,'999999')">logid</option>
  <option value="tech">tech</option>
  <option value="servername">servername</option>
  <option value="logfile">logfile</option>
  <option value="remarks">remarks</option>
  <option value="inserttime">inserttime</option>
  <option value="checkstatus">checkstatus</option>
</select><br />
LIKE  <input type="text" name="eq"><br>
ORDER BY  
<select name="ob">
  <option value="1"></option>
  <option value="to_char(logid,'999999')">logid</option>
  <option value="tech">tech</option>
  <option value="servername">servername</option>
  <option value="logfile">logfile</option>
  <option value="remarks">remarks</option>
  <option value="inserttime">inserttime</option>
  <option value="checkstatus">checkstatus</option>
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
  SELECT *  FROM serveradm.checklog 
  where  $_POST[kol]  like '%$_POST[eq]%'
  order by  $_POST[ob]; ");
}
else {
  $myresult = pg_query($connection, "
SELECT *  FROM serveradm.checklog order by 6 desc limit 20; "); } 

echo pg_last_error($connection);


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


while ($row = pg_fetch_array($myresult)) {
 $serverid = $row['serverid'];
 $servername = $row['servername'];
 echo "<tr>";
  echo "<td>" . $row[0] .  "</td>";
  echo "<td>" . $row[1] .  "</td>";
  echo "<td>" . " $row[2]  " .  "</td>";
  echo "<td>" . " $row[3]  " .  "</td>";
  echo "<td>" . " $row[4]  " .  "</td>";
  echo "<td>" . " $row[5]  " .  "</td>";
  echo "<td>" . " $row[6]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}

?>

</body>
</html> 




