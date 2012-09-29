<html>
<head>
<title>New Client</title>
<link href="default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    function addnewmonth(key, cog){
    myWindow=window.open('','','width=450,height=100');
    myWindow.document.write("<html>");
    myWindow.document.write("<title>Editing Contacts</title>");
    myWindow.document.write("<body style=background-color:#ffb542;>");
    myWindow.document.write("<form action=addnewmonth.php method=post>");
    myWindow.document.write("<table>");
    myWindow.document.write("<tr><td><input type=hidden name=id value="+key+"></tr></td>");
    myWindow.document.write("<tr><td>Month: <input type=text name=month></tr></td>");
    myWindow.document.write("<tr><td><input type=hidden name=cog value="+cog+"></tr></td>");
    myWindow.document.write("<tr><td><input type='submit' value = 'Save'></td></tr>");
    myWindow.document.write("</table>");
    myWindow.document.write("</form>");
    myWindow.document.write("</body>");
    myWindow.document.write("</html>");
    myWindow.focus();
    }
</script>
</head>
<body>
<div id="header">
	<h1>Sunscreen</h1>
	<h2>EBCO Distributors Inc.</h2>
</div>
<!-- end #header -->
<div id="menu">
	<ul>
		<li class="first"><a href="index.php" accesskey="1" title="">Home</a></li>
		<li><a href="newclient.php" accesskey="2" title="">New Client</a></li>
		<li><a href="#" accesskey="3" title="">Logout</a></li>

	</ul>
</div>
<!-- end #menu -->
<div id="content">
	<div id="posts">
		<div class="post">
			<h2 class="title">Sunscreen Database</h2>
			<div class="story">

			</div>
		</div>
		<div class="post">
    
                    
                <form name="client" action="" method="post" onsubmit="return verify()">
                        <?php
                        $con = mysql_connect("localhost","root","qwerty314");
                        if (!$con)
                          {
                          die('Could not connect: ' . mysql_error());
                          }

                        mysql_select_db("sunscreen", $con);
                        $key=$_POST['pkey'];
                        $cog=$_POST['cog'];
                        echo $key, $cog;
                        $result = mysql_query("SELECT idm, months, cog, id FROM months");

                                        echo "<table class='tablem'>";
                                        echo "<tr>";
                                        echo "<th>Month</th>";
                                        echo "<th>Cost for this month</th>";
                                        echo "<th>Command</th>";
                                        echo "</tr>";

                        while($row = mysql_fetch_array($result))
                          {
                                        echo "<tr>";
                                        echo "<td><b>".htmlspecialchars($row['months'])."</b></td>";
                                        echo "<td><b>".htmlspecialchars($row['cog'])."</b></td>";
                                        echo "<td><a href = client.php?pkey=".$row['idm']."&cog=".$row['cog'].">Edit / View</a></td>";
                                        echo "</tr>";
                          }
                                        echo "</table>";

                           //To add a new month
                           echo "<input type='button' value = 'Add New Month' onclick=addnewmonth('$key','$cog');>";
                        mysql_close($con);
                        ?>
                </form>
                       
		</div>
	</div>

	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end #content -->
<div id="footer">
	<p id="legal">EBCO Distributors Inc.</p>
</div>
<!-- end #footer -->
</body>
</html>


<?php
?>



