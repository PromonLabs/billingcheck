<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<h3>ERRORLOG:INSERT DATA<h3></h1>
<br>
<a href="/">HOME</a> 
<a href="itopscheck.html">BACK</a>
<a href="error_log_select.php">SELECT DATA</a>
<a href="error_log_update.php">UPDATE DATA</a>
<a href="error_log_delete.php">DELETE DATA</a>
<h3>Before submit insert a description<h3></h1>

<h5 align="center" >
<form action="error_log_insert.php" method="post">

<?php
echo $_SERVER['REMOTE_USER'];

if ($_SERVER['REMOTE_USER'] == "hapi"  || $_SERVER['REMOTE_USER'] == "pfbl" ) {

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


ALARMTYPE : 
<select name="errortype">
  <option value="icinga">icinga</option>
  <option value="billingcheck">billingcheck</option>
</select><br />

Description : <textarea  rows="6" cols="70" name="remarks"></textarea><br>

<input type="submit" name="search">
</form>
</h5>

<?php
if($_POST['remarks']) {

error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=serveradmdb user=serveradmin password=serveradmin");
if (!$connection) {
    print("Connection Failed.");
    exit;
}

$user = pg_escape_literal($_SERVER['REMOTE_USER']);
$errortype = pg_escape_literal(trim($_POST['errortype']));
$remarks = pg_escape_literal($_POST['remarks']);


$myresult = pg_query($connection,
 "INSERT INTO serveradm.error_log(created_by,inserttime,remarks,errortype)
  VALUES ({$user},to_char(CURRENT_TIMESTAMP,'yyyy-mm-dd:hh24'),{$remarks},{$errortype}); ");


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
  SELECT *  FROM serveradm.error_log 
  order by error_id desc limit 1 ");

if (!$myresult) {
  echo "An error occurred : \n";
  echo "<br>";
  echo pg_last_error($connection);
  echo "<br>";
  echo pg_result_error ($connection);
  exit;
  
}

header("Location:http://billingcheck.srv.gl/itopscheck/error_log_ack.php");
// hvis nedenstående  funktion ikke er der virker redirection ikke
ob_end_flush(void);




}

else
{
print "PLEASE INSERT A DESCRIPTION  ";
}
?>

</body>
</html> 


