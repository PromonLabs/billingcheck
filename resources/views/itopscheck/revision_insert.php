<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>REVISIONS LOG:GODKEND ÅRSHJUL <h3></h1>
<h3><time><?php echo date('l jS \of F Y h:i:s A'); ?></time></h3>
<a href="/">HOME</a> 
<a href="itopscheck.html">BACK</a>

<h5 align="center" >
<form action="revision_insert.php" method="post">


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

ÅR
<select name="aar">
 <option value=""></option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
</select><br />


MÅNED
<select name="maaned">
 <option value=""></option>
  <option value="jan">jan</option>
  <option value="feb">feb</option>
  <option value="marts">marts</option>
  <option value="april">april</option>
  <option value="maj">maj</option>
  <option value="juni">juni</option>
  <option value="juli">juli</option>
  <option value="aug">aug</option>
  <option value="sep">sep</option>
  <option value="okt">okt</option>
  <option value="nov">nov</option>
  <option value="dec">dec</option>
</select><br />


<?php
include('systemname_function.php');
echo "SYSTEM";
dropsystemnames(systemname);
?><br>

CHECKSTATUS
<select name="checkstatus">
 <option value=""></option>
  <option value="godkendt">godkendt</option>
  <option value="info">info</option>
</select><br />

REMARKS : <textarea  rows="4" cols="50" name="remarks">.</textarea><br>

<input type="submit" name="search">
</form>
</h5>

<?php


if($_POST['aar']) {

error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");
if (!$connection) {
    print("Connection Failed.");
    exit;
}

$tech1 = pg_escape_literal($_SERVER['REMOTE_USER']);
$systemname = pg_escape_literal(trim($_POST['systemname']));
$aar = pg_escape_literal(trim($_POST['aar']));
$maaned = pg_escape_literal(trim($_POST['maaned']));
$checkstatus = pg_escape_literal(trim($_POST['checkstatus']));
$remarks = pg_escape_literal(trim($_POST['remarks']));


$myresult = pg_query($connection,
 "INSERT INTO serveradm.revisions_checklog(tech, systemname, aar,maaned, remarks, inserttime,checkstatus)
  VALUES ({$tech1},{$systemname},{$aar},{$maaned},{$remarks},to_char(CURRENT_TIMESTAMP,'yyyy-mm-dd hh24:mi'),{$checkstatus}); ");

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
  SELECT *  FROM serveradm.revisions_checklog 
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
<th>systemnavn</th>
<th>år</th>
<th>måned</th>
<th>bemærkning</th>
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
  echo "<td>" . " $row[7]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}

else
{
print "Indtast år ";
}
?>

</body>
</html> 


