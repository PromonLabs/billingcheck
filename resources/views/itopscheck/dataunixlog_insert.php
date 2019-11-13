<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>DATA_UNIX CHECK LOG:INSERT DATA <h3></h1>
<h3><time><?php echo date('l jS \of F Y h:i:s A'); ?></time></h3>
<a href="/">HOME</a> 
<a href="itopscheck.html">BACK</a>
<a href="dataunixlog_select.php">SELECT DATA</a>
<a href="dataunixlog_update.php">UPDATE DATA</a>
<a href="dataunixlog_delete.php">DELETE DATA</a><br><br>

<a href="http://10.60.255.50/icinga/">ICINGA</a><br>
<a href="http://telewebapps/esbtest/">ESB TEST (Hvis den ikke virker i Firefox brug Chromium : http://telewebapps/esbtest/ => sianiut\xxx)</a><br>
<a href="http://centnuk34.sianiut.tele.gl:8080/SanityCheck/ESBStatus">ESB test:Centnuk34</a><br>
<a href="http://centnuk35.sianiut.tele.gl:8080/SanityCheck/ESBStatus">ESB test:Centnuk35</a><br>
<a href="http://10.60.219.126:8080/">EMM GUI : log ind på 126,129</a><br>
<a href="http://nfc1.srv.gl/">Netflowscollector</a><br>
<a href="http://10.60.219.162/comverse/comversecheck.php">Comverse</a><br>
<a href="http://10.60.219.162/billingadm/noc.php">NOC</a><br>
<!--<a href="https://qradar01.sianiut.tele.gl/">qradar logging check =>  compliance overview / view in log activity => (til test) </a><br> -->
<a href="https://mit.telepost.gl/da">check modemuser (pw:modem123)</a><br>

<hr5>Check backup : tgmedfem/tgtestfem/tgtestolm/centnuk snapshot backup se mail<hr5><br>
<hr5>Check logfiler  : rdbnuk13,ndbnuk9,ndbnuk10, bliver tilsendt med mail hver dag <hr5><br>

<h5 align="center" >
<form action="dataunixlog_insert.php" method="post">


&nbsp;

<?php
echo $_SERVER['REMOTE_USER'];

if ($_SERVER['REMOTE_USER'] == "hapi"  || $_SERVER['REMOTE_USER'] == "kij"  || 
$_SERVER['REMOTE_USER'] == "perr"  || $_SERVER['REMOTE_USER'] == "las" || $_SERVER['REMOTE_USER'] == "emk" ||  $_SERVER['REMOTE_USER'] == "comv" || 
$_SERVER['REMOTE_USER'] == "nich" || $_SERVER['REMOTE_USER'] == "jm") {

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
  <option value="backup">backup</option>
  <option value="restorecheck">restorecheck</option>
  <option value="godkendt">godkendt</option>
  <option value="incident">incident</option>
  <option value="info">info</option>
  <option value="logcheck">logcheck</option>
  <option value="dwh_auditdb">dwh_auditdb</option>
  <option value="axapta_auditdb">axapta_auditdb</option>
  <option value="scancheck">scancheck</option>
  <option value="revenue">revenue</option>
  <option value="job_change">job_change</option>
  <option value="bss_monitoring">bss_monitoring</option>
  <option value="teknikrum">teknikrum</option>
  <option value="network_scanning">network_scanning</option>
</select><br />


CHECKSTATUS
<select name="checkstatus">
  <option value="ok">ok</option>
  <option value="error">error</option>
  <option value="godkendt">godkendt</option>
  <option value="info">info</option>
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


