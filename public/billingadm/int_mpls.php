<html>
<body>

<h5 align="center" >
<form action="int_mpls.php" method="post">
INT CUSTOMER: <input type="text" name="name"><br>
<input type="submit">
<br>
<a href="http://10.60.219.162/">HOME</a>
</form>
</h5>

<?php
if($_POST['name']) {

echo( '<a href="http://10.60.219.162/">HOME</a>' );


error_reporting(E_ALL & ~E_NOTICE);
  $connection = pg_connect("host=10.60.219.163 port=5432 dbname=billingstat user=nocuser password=noc123");


// let me know if the connection fails
if (!$connection) {
    print("Connection Failed.");
    exit;
}


$myresult = pg_query($connection, "SELECT to_char(starttime,'yyyy-mm-dd hh24'),round(sum(t.txbytes+ t.rxbytes)/1000000) FROM emm_netflow.cdr_netflow_raw t where tg_siid_customer_name = '$_POST[name]' group by 1 order by 1; ");
echo pg_last_error($connection);

echo "<table border='1'>
<tr>
<th>Startdate</th>
<th>usage</th>
</tr>";


while ($row = pg_fetch_row($myresult)) {
 echo "<tr>";
  echo "<td>" . " $row[0]  " .  "</td>";
  echo "<td>" . " $row[1]  " .  "</td>";
 echo "</tr>";
}

echo "</table>";

}

?>

</body>
</html> 




