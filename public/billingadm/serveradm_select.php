<html>
<head>
  <meta charset="utf-8">
</head>
<body>

<h3>SERVERADM:SELECT DATA<h3></h1>

<a href="/">HOME</a>
<br>

<h5 align="center" >
<form action="serveradm_select.php" method="post">

SELECT *  FROM SERVERDATA WHERE  
<select name="kol">
  <option value=""></option>
  <option value="to_char(serverid,'999999')">serverid</option>
  <option value="servername">hostname</option>
  <option value="stype">stype</option>
  <option value="os">os</option>
  <option value="bu">bu</option>
  <option value="pw">pw</option>
  <option value="monitor">monitor</option>
  <option value="serviceid">serviceid</option>
  <option value="service">service</option>
  <option value="serviceowner">serviceowner</option>
  <option value="xsystem">xsystem</option>
  <option value="user1">user1</option>
  <option value="user2">user2</option>
  <option value="tech1">tech1</option>
  <option value="tech2">tech2</option>
  <option value="noc1">noc1</option>
  <option value="noc2">noc2</option>
</select><br />
LIKE  <input type="text" name="eq"><br>
ORDER BY  
<select name="ob">
  <option value="1"></option>
  <option value="to_char(serverid,'999999')">serverid</option>
  <option value="servername">hostname</option>
  <option value="stype">stype</option>
  <option value="os">os</option>
  <option value="bu">bu</option>
  <option value="pw">pw</option>
  <option value="monitor">monitor</option>
  <option value="serviceid">serviceid</option>
  <option value="service">service</option>
  <option value="serviceowner">serviceowner</option>
  <option value="xsystem">xsystem</option>
  <option value="user1">user1</option>
  <option value="user2">user2</option>
  <option value="tech1">tech1</option>
  <option value="tech2">tech2</option>
  <option value="noc1">noc1</option>
  <option value="noc2">noc2</option>
</select><br />



<input type="submit" name="submit">
</form>
</h5>

<?php
if($_POST['submit']) {



error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=nocuser password=noc123");


// let me know if the connection fails
if (!$connection) {
    print("Connection Failed.");
    exit;
}


if($_POST['kol']) {
  $myresult = pg_query($connection, "
  SELECT *  FROM serveradm.serverdata 
  where  $_POST[kol]  like '%$_POST[eq]%'
  order by  $_POST[ob]; ");
}
else {
  $myresult = pg_query($connection, "
SELECT *  FROM serveradm.serverdata order by $_POST[ob]; "); } 

echo pg_last_error($connection);


echo "<table border='1'>
<tr>
<th>serverid</th>
<th>hostname</th>
<th>stype</th>
<th>os</th>
<th>backup</th>
<th>pw</th>
<th>monitor</th>
<th>sid</th>
<th>sname</th>
<th>sowner</th>
<th>xsystem</th>
<th>user1</th>
<th>user2</th>
<th>tech1</th>
<th>tech2</th>
<th>noc1</th>
<th>noc2</th>
<th>inserttime</th>
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
  echo "<td>" . " $row[7]  " .  "</td>";
  echo "<td>" . " $row[8]  " .  "</td>";
  echo "<td>" . " $row[9]  " .  "</td>";
  echo "<td>" . " $row[10]  " .  "</td>";
  echo "<td>" . " $row[11]  " .  "</td>";
  echo "<td>" . " $row[12]  " .  "</td>";
  echo "<td>" . " $row[13]  " .  "</td>";
  echo "<td>" . " $row[14]  " .  "</td>";
  echo "<td>" . " $row[15]  " .  "</td>";
  echo "<td>" . " $row[16]  " .  "</td>";
  echo "<td>" . " $row[17]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}

?>

</body>
</html> 




