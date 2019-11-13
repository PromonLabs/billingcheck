<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>COMVERSE TEAM:INSERT DATA <h3></h1>
<h3><time><?php echo date('l jS \of F Y h:i:s A'); ?></time></h3>
<a href="/">HOME</a> 
<a href="/comverse/comversecheck.php">BACK</a>
<a href="/itopscheck/comverselog_select.php">SELECT</a>

<h5 align="center" >
<form action="comverselog_insert.php" method="post">


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

CHECK
<select name="checktype">
 <option value=""></option>
  <option value="billingcheck">billingcheck</option>
  <option value="godkendt">godkendt</option>
  <option value="info">info</option>
  <option value="changes">changes</option>
</select><br />


CHECKSTATUS
<select name="checkstatus">
  <option value="ok">ok</option>
  <option value="process_offline_usage">process_offline_usage</option>
  <option value="work_around"_upo>work_around_upo</option>
  <option value="reload">reload</option>
  <option value="maintenance">maintenance</option>
  <option value="outage">outage</option>
  <option value="error">error</option>
  <option value="incident">incident</option>
</select><br />

REMARKS : <textarea  rows="4" cols="50" name="remarks">.</textarea><br>

<input type="submit" name="search">
</form>
</h5>

<?php


if($_POST['checktype']) {

error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");
if (!$connection) {
    print("Connection Failed.");
    exit;
}

$tech1 = pg_escape_literal($_SERVER['REMOTE_USER']);
$checktype = pg_escape_literal(trim($_POST['checktype']));
$checkstatus = pg_escape_literal(trim($_POST['checkstatus']));
$remarks = pg_escape_literal(trim($_POST['remarks']));


$myresult = pg_query($connection,
 "INSERT INTO serveradm.dataunixlog(tech, checktype, checkstatus, remarks, inserttime)
  VALUES ({$tech1},{$checktype},{$checkstatus},{$remarks},to_char(CURRENT_TIMESTAMP,'yyyy-mm-dd hh24:mi')); ");

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
  SELECT *  FROM serveradm.dataunixlog 
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
<th>check</th>
<th>checktype</th>
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
 echo "</tr>";
}

echo "</table>";

}

else
{
print "Indtast check ";
}
?>

</body>
</html> 


