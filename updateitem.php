<?php
$con = mysql_connect("localhost","root","qwerty314");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sunscreen", $con);
$key=$_POST['pkey'];
$total =$_POST['cog']*$_POST['stockstatus'];
$sql="UPDATE items SET ssao='$_POST[ssao]', stockstatus='$_POST[stockstatus]', cog='$_POST[cog]', costcu='$_POST[costcu]', total='$total' WHERE id='$key'";

mysql_query($sql);
mysql_close($con);

echo "<html>
    <head>

    </head>
    <body style=background-color:#ffb542;>
       <script type='text/javascript'>
            alert('Record Successfully Edited');
            window.close();
            if (window.opener && !window.opener.closed) {
            window.opener.location.reload();
            }
        </script>";
?>

</body>
</html>

