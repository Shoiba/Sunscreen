<?php
$con = mysql_connect("localhost","root","qwerty314");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sunscreen", $con);
$fk=$_POST['id'];
$sql="INSERT INTO client (name, idm) VALUES ('$_POST[name]',$fk)";

mysql_query($sql);
mysql_close($con);

echo "<html>
    <head>

    </head>
    <body style=background-color:#ffb542;>
       <script type='text/javascript'>
            alert('Record Successfully Added');
            window.close();
            if (window.opener && !window.opener.closed) {
            window.opener.location.reload();
            }
        </script>";
?>

</body>
</html>
