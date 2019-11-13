<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>DATA_UNIX CHECK LOG:INSERT DATA <h3></h1>
<a href="/">HOME</a> 
<a href="dataunixlog_select.php">SELECT DATA</a>
<a href="dataunixlog_update.php">UPDATE DATA</a>
<a href="dataunixlog_delete.php">DELETE DATA</a><br>
<h3>DATA_UNIX CHECKS : <h3></h1><br>

<a href="http://10.60.255.50/icinga/">ICINGA</a><br>
<a href="http://10.60.225.21:8080/SanityCheck/ESBStatus">ESB check</a><br>
<a href="http://10.60.219.162/billingadm/noc.html"> flowcheck</a><br>
<hr5>tgmed serverbackup : idbnuk2/tsm tgmedfem/tgtestfem/tgtestolm snapshot backup se mail<hr5><br>

<h5 align="center" >
<form action="dataunixlog_insert.php" method="post">


&nbsp;

<?php
echo $_SERVER['REMOTE_USER'];
include('serveradm_function.php');
echo "TECH1:";
dropinit(tech1);
?>
<br>

CHECK
<select name="checktype">
  <option value="billingcheck">billingcheck</option>
  <option value="backup">backup</option>
</select><br />


CHECKSTATUS
<select name="checkstatus">
  <option value="ok">ok</option>
  <option value="error">error</option>
</select><br />

REMARKS : <textarea  rows="4" cols="50" name="remarks">.</textarea><br>

<input type="submit" name="search">
</form>
</h5>

<?php


if($_POST['tech1']) {

error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");
if (!$connection) {
    print("Connection Failed.");
    exit;
}

$tech1 = pg_escape_literal($_POST['tech1']);
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
print "Indtast initialer ";
}
?>

</body>
</html> 


