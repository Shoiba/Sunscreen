<?php
$con = mysql_connect("localhost","root","qwerty314");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sunscreen", $con);
$fk=$_POST['idc'];
$sql="INSERT INTO detailed (joborder, qty, datedelivered, remarks, idc) VALUES ('$_POST[joborder]','$_POST[qty]','$_POST[datedelivered]','$_POST[remarks]',$fk)";

mysql_query($sql);
mysql_close($con);


?>

