<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>REVISIONS LOG:UPDATE DATA<h3></h1>

<a href="/">HOME</a>
<br>
<a href="itopscheck.html">BACK</a>
<a href="checklog_select.php">SELECT DATA</a>
<a href="checklog_insert.php">INSERT DATA</a>
<a href="checklog_delete.php">DELETE DATA</a>


<h5 align="center" >
<form action="revision_update.php" method="post">
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



UPDATE DATAUNIXLOG SET   
<select name="kol">
  <option value=""></option>
  <option value="logid">logid</option>
  <option value="tech">tech</option>
  <option value="systemname">systemnavn</option>
  <option value="aar">år</option>
  <option value="maaned">måned</option>
  <option value="remarks">remarks</option>
  <option value="inserttime">inserttime</option>
  <option value="checkstatus">checkstatus</option>
</select><br />

<textarea  rows="4" cols="50" name="eq">.</textarea><br>

WHERE LOGID =  <input type="text" name="logid"><br>

<input type="submit" name="search">
</form>
</h5>


<?php
if($_POST['logid']) {

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
 "UPDATE serveradm.revisions_checklog SET $_POST[kol]=lower({$eq})  WHERE  logid=$_POST[logid]; "); 

 $myresult = pg_query($connection, "
  SELECT *  FROM serveradm.revisions_checklog 
  where  logid =  $_POST[logid] "); 

echo pg_last_error($connection);

echo "<table border='1'>
<tr>
<th>logid</th>
<th>tech</th>
<th>systemnavn</th>
<th>aar</th>
<th>maaned</th>
<th>remarks</th>
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
 echo "</tr>";
}

echo "</table>";

}


?>

</body>
</html> 




