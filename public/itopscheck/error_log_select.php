<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<h3>ERRORLOG:SELECT DATA<h3></h1>

<a href="/">HOME</a>
<a href="itopscheck.html">BACK</a>
<a href="error_log_delete.php">DELETE DATA</a>
<a href="error_log_insert.php">INSERT DATA</a>
<a href="error_log_update.php">UPDATE DATA</a>


<h5 align="center" >
<form action="error_log_select.php" method="post">
<?php
echo $_SERVER['REMOTE_USER'] ; 
 print(" is authorized to use this feature ");

?>
<br>
<br>


SELECT *  FROM ERRORLOG WHERE  
<select name="kol">
  <option value=""></option>
  <option value="to_char(error_id,'999999')">errorid</option>
  <option value="created_by">tech</option>
  <option value="errortype">errortype</option>
  <option value="caseclosed">completed</option>
  <option value="remarks">description</option>
  <option value="inserttime">inserttime</option>
</select><br />
LIKE  <input type="text" name="eq"><br>
ORDER BY  
<select name="ob">
  <option value="1"></option>
  <option value="to_char(error_id,'999999')">errorid</option>
  <option value="created_by">tech</option>
  <option value="errortype">errortype</option>
  <option value="caseclosed">completed</option>
  <option value="remarks">description</option>
  <option value="inserttime">inserttime</option>
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
  SELECT *  FROM serveradm.error_log 
  where  $_POST[kol]  like '%$_POST[eq]%'
  order by  $_POST[ob]; ");
}
else {
  $myresult = pg_query($connection, "
SELECT *  FROM serveradm.error_log order by 6 desc limit 20; "); } 

echo pg_last_error($connection);


echo "<table border='1'>
<tr>
<th>errorid</th>
<th>tech</th>
<th>inserttime</th>
<th>description</th>
<th>completed</th>
<th>completed_by</th>
<th>errortype</th>
<th>wiki</th>
</tr>";


while ($row = pg_fetch_array($myresult)) {
 echo "<tr>";
  echo "<td>" . $row[0] .  "</td>";
  echo "<td>" . $row[1] .  "</td>";
  echo "<td>" . " $row[2]  " .  "</td>";
  echo "<td>" . " $row[3]  " .  "</td>";
  echo "<td>" . " $row[4]  " .  "</td>";
  echo "<td>" . " $row[6]  " .  "</td>";
  echo "<td>" . " $row[5]  " .  "</td>";
  echo "<td><a href='http://wiki.srv.gl/dokuwiki/doku.php?id=billingcheck_log:$row[0]'>Dokuwiki</a></td>";
 echo "</tr>";
}

echo "</table>";

}

?>

</body>
</html> 




